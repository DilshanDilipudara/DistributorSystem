<template>
    <div class="sales_list3">
    <div class="mb-5" v-if="articles.length > 0">
        <button type="button" class="close" @click="removeTempList">
            <span>&times;</span>
        </button>
        <div class="border-bottom border-secondary text1 mb-2"></div>
        <div class="sales_list1">
            <div class="low_width bg-secondary p-1 pt-2">#</div>
            <div class="mid_width bg-secondary p-1 pt-2">Article name</div>
            <div class="mid_width bg-secondary p-1 pt-2">Volume</div>
            <div class="mid_width bg-secondary p-1 pt-2">Unit Price</div>
            <div class="mid_width bg-secondary p-1 pt-2">Sale Quantity</div>
            <div class="mid_width bg-secondary p-1 pt-2">Discount</div>
            <div class="mid_width bg-secondary p-1 pt-2">%Value</div>
            <div class="mid_width bg-secondary p-1 pt-2">Total</div>
            <div class="mid_width bg-secondary p-1 pt-2">Free offer</div>
            <div class="mid_width bg-secondary p-1 pt-2">Min qty</div>
            <div class="mid_width bg-secondary p-1 pt-2">Added</div>
        </div>


        <article-temp-row v-for="(art, index) in articles"
                          :article='art'
                          :ind='index'
                          :key="art.id"
                          :itmList="salesList"
                        @add-changed="handleAddChange"></article-temp-row>


<!--        <div class="border-bottom border-secondary text1 mt-2"></div>-->

        <!--<modal-window @change-allowed="fetchArticles"
                      @hide-modal="resetCategoryDropdown"
                      :title="'Are you sure?'"
                      :message="'Details you entered will be lost!'"
                      :allow-btn-msg="'Proceed Anyway'"
                      :cancel-btn-msg="'Cancel'"
                      v-if="showModal"></modal-window>-->
    </div>

        <div>
            <div class="border-bottom border-secondary text1 mb-2"></div>
            <h5 class="col-md-12 text-center"> Item List</h5>
            <div class="sales_list1">
                <div class="sales_list2 bg-secondary p-1 pt-2">#</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Article name</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Volume</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Unit Price</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Sale Quantity</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Discount</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">%Value</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Total</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Free offer</div>
                <div class="sales_list2 bg-secondary p-1 pt-2">Min qty</div>
            </div>

            <article-row v-for="(art, index) in salesList" :article='art' :ind='index' :key="art.id"
                         :initQts="saleQts[art.id]"
                         @update-total="updateSubTotal"
                         @update-discount="updateDiscount"
                         @error-status-change="updateErrorList"></article-row>
            <div class="sales_list1">
                <div class="sales_list6 p-1 pt-2">&#160;</div>
                <div class="sales_list2 p-1 pt-2">Total</div>
                <div class="sales_list2 p-1 pt-2">{{ discount}}</div>
                <div class="sales_list2 p-1 pt-2">{{ total }}</div>
            </div>
            <input type="hidden" name="discount" :value="discount">
            <input type="hidden" name="total" :value="total">

            <div class="border-bottom border-secondary text1 mt-2"></div>
        </div>
    </div>
</template>

<script>
    import ArticleRow from './ArticleRow';
    import ArticleTempRow from './ArticleTempRow';
    import ModalWindow from './ModalWindow';

    export default {
        components: {
            ArticleRow,
            ModalWindow,
            ArticleTempRow
        },

        data() {
            return {
                articles: [],
                salesList: [],
                subTotal: [],
                subDiscount: [],
                errorList: [],
                total: 0,
                discount: 0,
                saleQts: {}

                // showModal: false,
                // prevSelected: '',

            };
        },

        methods: {
            /*resetCategoryDropdown() {
                this.showModal = false;
                document.getElementById('articleCatList').value = this.prevSelected;
            },*/
            fetchArticles() {
                const list = document.getElementById('articleCatList');

                axios.get(`/prod-cat/${list.value}/articles`).then((response) => {
                    /*this.subTotal = [];
                    this.subDiscount = [];
                    this.errorList = [];
                    this.total = 0;
                    this.discount = 0;*/
                    this.articles = response.data;
                }).catch((error) => {
                    console.error(error)
                });

                // this.showModal = false;
            },
            updateSubTotal(emitted) {
                this.subTotal[emitted[1]] = emitted[0];
                this.total = this.subTotal.reduce((total, num) => {
                    return total + num;
                }, 0);
                this.$emit('total-change', this.total);
            },
            updateDiscount(emitted) {
                this.subDiscount[emitted[1]] = emitted[0];
                this.discount = this.subDiscount.reduce((total, num) => {
                    return total + num;
                }, 0);
            },
            updateErrorList(emitted) {
                this.errorList[emitted[1]] = emitted[0];
                this.$emit('error-state-change', this.errorList.every(val => { return val === false; }));
            },
            handleAddChange(data) {
                const artIndex = this.salesList.findIndex((itm) => {
                    return itm.id === data[2];
                });

                if(!data[1] && artIndex >= 0) {
                    this.salesList.splice(artIndex, 1);
                }
                if(data[1] && artIndex < 0) {
                    this.saleQts[data[2]] = {
                        saleQt: data[3],
                        discount: data[4],
                        freeOffer: data[5],
                    };
                    this.salesList.push(this.articles[data[0]]);
                }
            },
            removeTempList() {
                this.articles = [];
            }
        },

        mounted() {
            document.getElementById('articleCatList').addEventListener('change', (event) => {
                if(event.target.value > 0 ){
                    /*if(this.total > 0) {
                        this.showModal = true;
                    }
                    else {
                        this.fetchArticles();
                    }*/
                    this.fetchArticles();
                }
                else {
                    this.articles = [];
                }
            });
            /*document.getElementById('articleCatList').addEventListener('focus', (event) => {
                this.prevSelected = event.target.value;
            });*/
        }
    }
</script>

<style>
    @media (min-width: 480px) {
        .sales_list6{
            width: 750px;
        }
    }
    @media (min-width: 1400px) {
        .low_width {
            width: 6%;
        }
        .mid_width{
            width: calc(94% / 10);
        }
        .sales_list6 {
            width: 50%;
        }
    }
</style>
