require('./bootstrap');
window.$ = require('jquery');

let Turbolinks = require('turbolinks');
Turbolinks.start();

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body'
});
