 import Vue from 'vue'
 import VueRouter from 'vue-router' 
 Vue.use(VueRouter)

 // import i componenti

 const router = new VueRouter ({
     mode: 'history',
     linkExactActiveClass: 'active',
     routes: [
         {path:'/', component: HomePage, name: 'home'},
         {path: '/products', component: ProductListPage, name: 'products'},
         {path: '/products/:product_name', component: SingleProductPage, name: 'product-detail'},
         {path: '/restaurants', component: RestaurantListPage, name: 'restaurants'},
         {path: '/restaurants/:restaurant_name', component: SingleRestaurantPage, name: 'restaurant-detail'},
         {path: '*', component: NotFoundPage, name: 'not-found'}
     ]
    
   
 });

 export default router