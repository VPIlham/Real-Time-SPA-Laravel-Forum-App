
require('./bootstrap');

import Vue from 'vue';
import router from './router.js';
 
Vue.component('app-home', require('./components/AppHome.vue').default);


const app = new Vue({
    el: '#app',
    router
});
