<template>
    <div>
        <article-row v-for="(art, index) in articles" :article='art' :ind='index' :key="index"
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
        <modal-window @change-allowed="fetchArticles"
                      @hide-modal="resetCategoryDropdown"
                      :title="'Are you sure?'"
                      :message="'Details you entered will be lost!'"
                      :allow-btn-msg="'Proceed Anyway'"
                      :cancel-btn-msg="'Cancel'"
                      v-if="showModal"></modal-window>
    </div>
</template>

<script>
    import ArticleRow from './ArticleRow';
    import ModalWindow from './ModalWindow';

    export default {
        components: {
            ArticleRow,
            ModalWindow
        },

        data() {
            return {
                articles: [],
                subTotal: [],
                subDiscount: [],
                errorList: [],
                total: 0,
                discount: 0,
                showModal: false,
                prevSelected: '',

            };
        },

        methods: {
            resetCategoryDropdown() {
                this.showModal = false;
                document.getElementById('articleCatList').value = this.prevSelected;
            },
            fetchArticles() {
                const list = document.getElementById('articleCatList');

                axios.get(`/prod-cat/${list.value}/articles`).then((response) => {
                    this.subTotal = [];
                    this.subDiscount = [];
                    this.errorList = [];
                    this.total = 0;
                    this.discount = 0;
                    this.articles = response.data;
                }).catch((error) => {
                    console.error(error)
                });

                this.showModal = false;
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
        },

        mounted() {
            document.getElementById('articleCatList').addEventListener('change', (event) => {
                if(event.target.value > 0 ){
                    if(this.total > 0) {
                        this.showModal = true;
                    }
                    else {
                        this.fetchArticles();
                    }
                }
            });
            document.getElementById('articleCatList').addEventListener('focus', (event) => {
                this.prevSelected = event.target.value;
            });
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
        .sales_list6 {
            width: 50%;
        }
    }
</style>
