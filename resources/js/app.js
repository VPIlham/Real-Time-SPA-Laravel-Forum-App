
require('./bootstrap');

import Vue from 'vue';
import router from './router.js';
import User from './helpers/User.js';

Vue.component('app-home', require('./components/AppHome.vue').default);

// jadi class user menjadi Class Global
window.User = User;
window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router
});
