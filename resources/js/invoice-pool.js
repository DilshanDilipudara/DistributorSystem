import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en'

Vue.use(ElementUI,{ locale });

Vue.component('invoice-pool', require('./components/pool/InvoicePool').default);

new Vue({
    el: '#app',
    data: {}
});

