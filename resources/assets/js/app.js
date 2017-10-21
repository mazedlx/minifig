require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

const app = new Vue({
    el: '#app',
});

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body',
});
