window.Vue = require("vue");
require("./bootstrap");

import Vue from "vue";
import router from "./routes.js";
import App from "./components/App.vue";
import { BootstrapVue } from "bootstrap-vue";
import Axios from "axios";
import vueBraintree from "vue-braintree";
import VueSweetalert2 from "vue-sweetalert2";

Vue.use(VueSweetalert2);
Vue.use(vueBraintree);

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(BootstrapVue);

const root = new Vue({
    // data: { isLoading: false },
    el: "#root",
    router,
    render: (h) => h(App),
});

// router.beforeEach((to, from, next) => {
//     App.isLoading = true
//     next()
// })

// router.afterEach((to, from, next) => {
//     setTimeout(() => App.isLoading = false, 1500) // timeout for demo purposes
//     next()
// })