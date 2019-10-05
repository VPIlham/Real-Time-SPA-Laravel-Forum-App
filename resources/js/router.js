import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import Forum from './components/forum/Forum.vue';
import Logout from './components/auth/Logout.vue';

Vue.use(VueRouter);

const routes = [
  {
    path : '/login',
    component : Login
  },
  {
    path : '/register',
    component : Register
  },
  {
    path : '/logout',
    component : Logout
  },
  {
    path : '/forum',
    component : Forum,
    name : 'forum'
  }
];

const router = new VueRouter({
  routes,
  hashbang : false,
  mode : 'history'
});

export default router;