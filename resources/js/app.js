
require('./bootstrap');

import Vue from 'vue';
import router from './router.js';
import User from './helpers/User.js';
import VueSimplemde from 'vue-simplemde';
import 'simplemde/dist/simplemde.min.css';
import md from 'marked';

Vue.component('app-home', require('./components/AppHome.vue').default);
Vue.component('vue-simplemde', VueSimplemde)

// jadi class user menjadi Class Global
window.User = User;
window.EventBus = new Vue();
window.md = md;

const app = new Vue({
    el: '#app',
    router
});
