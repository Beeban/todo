/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Topmenu from './components/Topmenu';
import PageHeading from './components/PageHeading';

require('./bootstrap');
window.Vue = require('vue');

import { BootstrapVue } from 'bootstrap-vue';

// Install BootstrapVue
Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app',

    components: { Topmenu, PageHeading },
});
