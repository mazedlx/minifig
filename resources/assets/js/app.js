import MinifigTableItem from './components/Minifigs/TableItem.vue';
import SetTableItem from './components/Sets/TableItem.vue';

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

const app = new Vue({
    el: '#app',
    components: {
        MinifigTableItem,
        SetTableItem,
    }
});

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body',
});
