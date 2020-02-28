/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Topmenu from './components/Topmenu';
import PageHeading from './components/PageHeading';
import LegalSearchForm from './components/legal/LegalSearchForm';
import LegalsTable from './components/legal/LegalsTable';

require('./bootstrap');
window.Vue = require('vue');

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue';

// Install BootstrapVue
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

const app = new Vue({
    el: '#app',

    components: { Topmenu, PageHeading, LegalSearchForm, LegalsTable },
});
