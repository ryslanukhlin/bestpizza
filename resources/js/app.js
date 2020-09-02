require('./bootstrap');

window.Vue = require('vue');

Vue.component('Pizza', require('./components/Pizza.vue').default);

const app = new Vue({
    el: '#app',
});
