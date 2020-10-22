window.Vue = require('vue');

Vue.component('article-list',
    require('./components/ArticleList/ArticleList.vue').default);
Vue.component('modal-window',
    require('./components/ArticleList/ModalWindow.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        shop: '{}',
        articles: [],
        salesList: [],
        cashTaken: false,
        creditTaken: false,
        chequeTaken: false,
        cashAmount: 0,
        chequeAmount: 0,
        noArticleErrors: true,
        showErrorModal: false,
        total: 0,
        errorMessage: '',
        showSaleSuccessModal: false,
        successMessage: '',
    },
    computed: {
        selectedShop() {
            return JSON.parse(this.shop);
        },
        cashNotAllowed() {
            this.cashTaken = false;
            this.cashAmount = 0;
            return !this.selectedShop.cash;
        },
        chequeNotAllowed() {
            this.chequeTaken = false;
            this.chequeAmount = 0;
            return !this.selectedShop.cheque;
        },
        creditNotAllowed() {
            this.creditTaken = false;
            return !this.selectedShop.credit;
        },
        hasCreditErrors() {
            if (!this.creditTaken)
                return (Number(this.cashAmount) + Number(this.chequeAmount)) <
                    this.total;
            return false;
        },
        noArticleQty() {
            return this.total <= 0;
        },
    },
    methods: {
        handleArticleError(errorStatus) {
            this.noArticleErrors = errorStatus;
        },
        handleTotalChange(newTotal) {
            this.total = newTotal;
        },
        fetchArticles() {
            const list = document.getElementById('articleCatList');

            axios.get(`/prod-cat/${list.value}/articles`).then((response) => {
                this.articles = response.data;
            }).catch((error) => {
                console.error(error);
            });
        },
        resetArticlesList() {
            this.articles = [];
        },
        rmvSalesListArticle(articleIndex) {
            this.salesList.splice(articleIndex, 1);
        },
        addSalesListArticle(artcleIndex) {
            this.salesList.push(this.articles[artcleIndex]);
        },
    },
    mounted() {
        document.getElementById('articleCatList').
            addEventListener('change', (event) => {
                if (event.target.value > 0) {
                    this.fetchArticles();
                } else {
                    this.articles = [];
                }
            });

        document.getElementById('add-new-sale-form').
            addEventListener('submit', (event) => {
                event.preventDefault();

                if (this.noArticleErrors && !this.hasCreditErrors &&
                    !this.noArticleQty) {

                    axios.post('/add-new-sale', new FormData(event.target)).
                        then(res => {
                            this.successMessage = `Your sale successfully saved with invoice number: <b>${res.data}</b>`;
                            this.articles = [];
                            this.salesList = [];
                            event.target.reset();
                            this.shop = 0;
                            this.showSaleSuccessModal = true;
                        }).catch(error => {
                        console.error(error);
                    });
                } else {
                    this.errorMessage = `There are some errors,<br>
                        ${!this.noArticleErrors ?
                        'sale quantity less than minimum quantity <br>' :
                        ''}
                        ${this.hasCreditErrors ?
                        'total and pay amount not balanced <br>' :
                        ''}
                        ${this.noArticleQty ? 'total value is 0' : ''}`;
                    this.showErrorModal = true;
                    return false;
                }
            });
    },
});

