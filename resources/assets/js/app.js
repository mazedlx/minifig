import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import NavBar from './components/NavBar.vue';
import store from './store';
import router from './router';

require('./bootstrap');

window.axios = require('axios');

window.axios.interceptors.request.use((config) => {
    config.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;
    return config;
});

window.Event = new Vue();

Vue.prototype.$http = axios;

const app = new Vue({
    router,
    store,
    el: '#app',
    components: {
        NavBar,
    },
});

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body',
});
