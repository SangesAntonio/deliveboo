import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

// import i componenti
import HomePage from "./components/pages/HomePage.vue";
import NotFoundPage from "./components/pages/NotFoundPage.vue";
import RestaurantListPage from "./components/restaurants/RestaurantListPage.vue";
import SingleRestaurantPage from "./components/restaurants/SingleRestaurantPage.vue";
import FilteredRestaurants from './components/restaurants/FilteredRestaurants.vue'

const router = new VueRouter({
    mode: "history",
    linkExactActiveClass: "active",
    routes: [

        { path: '/', component: HomePage, name: 'home' },
        { path: '/restaurants', component: RestaurantListPage, name: 'restaurants' },
        { path: '/restaurants/:id', component: SingleRestaurantPage, name: 'restaurant-detail' },
        { path: '/categories/:id', component: FilteredRestaurants, name: 'filtered-restaurants' },

        { path: '*', component: NotFoundPage, name: 'not-found' }
    ]

});
export default router;