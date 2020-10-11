window.Vue = require('vue');

Vue.component('article-list', require('./components/ArticleList/ArticleList.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        cashTaken: false,
        creditTaken: false,
        chequeTaken: false
    }
});

