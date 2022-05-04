window.Vue = require('vue');

require('./bootstrap');

import Vue from 'vue';
import { BootstrapVue } from 'bootstrap-vue'
import router from './routes.js';
import App from './components/App.vue';


import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)


const root = new Vue({
    el: '#root',
    router,
    render: h => h(App)
});