window.Vue = require('vue');

Vue.component('article-list',
    require('./components/ArticleList/ArticleList.vue').default);
Vue.component('modal-window',
    require('./components/ArticleList/ModalWindow.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        shop: '{}',
        cashTaken: false,
        creditTaken: false,
        chequeTaken: false,
        cashAmount: 0,
        chequeAmount: 0,
        noArticleErrors: true,
        showErrorModal: false,
        total: 0,
        errorMessage: '',
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
    },
    mounted() {
        document.getElementById('add-new-sale-form').
            addEventListener('submit', (event) => {
                event.preventDefault();

                if (this.noArticleErrors && !this.hasCreditErrors &&
                    !this.noArticleQty) {
                    document.getElementById('add-new-sale-form').submit();
                }
                else {
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

