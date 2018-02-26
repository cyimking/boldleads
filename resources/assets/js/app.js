// app.js

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxious from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxious, axios);

import App from './App.vue';
import CreateLead from './components/lead/Create.vue';
import DisplayLead from './components/lead/View.vue';
import DisplayLeadListing from './components/lead/List.vue';
import Login from './components/auth/Login.vue';

// Pagination component
Vue.component('pagination', require('laravel-vue-pagination'));

// Require bootstrap
require('./bootstrap');

Vue.prototype.$bus = new Vue();

const routes = [
    {
        path: '/',
        name: 'CreateLead',
        component: CreateLead
    },
    {
        path: '/leads',
        name: 'DisplayLeadListing',
        component: DisplayLeadListing
    },
    {
        path: '/leads/:id',
        name: 'DisplayLead',
        component: DisplayLead
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

new Vue(Vue.util.extend({ router }, App)).$mount('#app');