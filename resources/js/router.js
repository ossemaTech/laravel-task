import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter)

import login from './components/Login.vue';
import dashboard from './components/Dashboard.vue';
const routes = [
    {
        path: '/login',
        component: login
    },
    {
        path: '/dashboard',
        component: dashboard
    }
]

export default new VueRouter({ mode: 'history', routes: routes })