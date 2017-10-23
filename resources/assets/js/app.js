import VueRouter from 'vue-router';
import routes from './routes';

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
});

Vue.prototype.$http = axios;
Vue.prototype.$api = route;

const app = new Vue({
    router,
    el: '#app',
});

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body',
});
