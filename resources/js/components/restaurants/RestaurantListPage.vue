<template>
<div>
    <!-- <ul v-for="user in users" :key="user.id"
        class="col-sm-6 col-md-4 col-xl-3">

    <li>
        {{user.restaurant_name}}
        {{user.address}}
        {{user.phone_number}}      
    </li>
     <li v-for="category in categories" :key="category.id">
        {{category.name}}
    </li> 
    </ul> -->
    <!-- <RestaurantCard> -->
</div>
</template>

<script>
import axios from 'axios';
// import RestaurantCard from 'RestaurantCard';
export default {
    name:'RestaurantList',
    // components:{
    //   RestaurantCard,
    // },
    data() {
    return {
      isLoading: false,
      users: [],
    };
    },
    methods: {
    getRestaurants() {
    //   this.isLoading = true;
      axios
        .get("http://localhost:8000/api/users")
        .then((res) => {
          this.users = res.data;
          console.log(res.data)
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },   
  },
  mounted(){
      this.getRestaurants()
  }
}

</script>

<style lang="scss" scoped>

</style>