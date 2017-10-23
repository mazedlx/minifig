import VueRouter from 'vue-router';
import routes from './routes';

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

window.axios.interceptors.request.use(function (config) {
    config.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    return config;
});


Vue.use(VueRouter);

const router = new VueRouter({
    routes,
});

Vue.prototype.$http = axios;
Vue.prototype.$api = routes;

const app = new Vue({
    router,
    el: '#app',
});

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body',
});
