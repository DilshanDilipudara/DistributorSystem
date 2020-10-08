<template>
    <div>
        <article-row v-for="(art, index) in articles" :article='art' :ind='index' :key="index"
                     @update-total="updateSubTotal" @update-discount="updateDiscount"></article-row>
        <div class="sales_list1">
            <div class="sales_list6 p-1 pt-2">&#160;</div>
            <div class="sales_list2 p-1 pt-2">Total</div>
            <div class="sales_list2 p-1 pt-2">{{ discount}}</div>
            <div class="sales_list2 p-1 pt-2">{{ total }}</div>
        </div>
        <input type="hidden" name="discount" :value="discount">
        <input type="hidden" name="total" :value="total">
    </div>
</template>

<script>
    import ArticleRow from './ArticleRow';

    export default {
        components: {
            ArticleRow,
        },

        data() {
            return {
                articles: [],
                subTotal: [],
                subDiscount: [],
                total: 0,
                discount: 0
            };
        },

        methods: {
            updateSubTotal(emitted) {
                this.subTotal[emitted[1]] = emitted[0];
                this.total = this.subTotal.reduce((total, num) => {
                    return total + num;
                }, 0);
            },
            updateDiscount(emitted) {
                this.subDiscount[emitted[1]] = emitted[0];
                this.discount = this.subDiscount.reduce((total, num) => {
                    return total + num;
                }, 0);
            },
        },

        mounted() {
            document.getElementById('articleCatList').addEventListener('change', (event) => {
                if(event.target.value > 0) {
                    axios.get(`/prod-cat/${event.target.value}/articles`).then((response) => {
                        this.subTotal = [];
                        this.subDiscount = [];
                        this.articles = response.data;
                    }).catch((error) => {
                        console.error(error)
                    });
                }
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
