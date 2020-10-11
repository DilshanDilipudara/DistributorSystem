window.Vue = require('vue');

Vue.component('shop-list', require('./components/Shop/ShopList').default);

const app = new Vue({
    el: '#app',
});

