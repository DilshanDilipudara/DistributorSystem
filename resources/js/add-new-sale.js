window.Vue = require('vue');

Vue.component('article-list', require('./components/ArticleList/ArticleList.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        shop: "{}",
        cashTaken: false,
        creditTaken: false,
        chequeTaken: false
    },

    computed: {
        selectedShop() {
            return JSON.parse(this.shop);
        },
        cashNotAllowed() {
            return this.selectedShop.cash === 0;
        },
        chequeNotAllowed() {
            return this.selectedShop.cheque === 0;
        },
        creditNotAllowed() {
            return this.selectedShop.credit === 0;
        }
    }
});

