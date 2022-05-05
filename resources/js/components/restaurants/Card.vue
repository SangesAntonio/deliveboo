<template>
<div class="col-2">
  <div class="card">
  <img class="card-img-top" :src="`/storage/${user.image}`" alt="Card image cap">  <!--//inserire src qui! -->
  <div class="card-body">
    <p class="card-text">
      <ul>
        <li class="text-black">{{user.address}}</li>
        <li class="text-black">{{user.restaurant_name}}</li>
        <ul v-for="category in user.categories" :key="category.id">
          <li>
            {{category.name}}
          </li>
        </ul>
      </ul>
    </p>
  </div>
  <router-link :to="{ name: 'restaurant-detail', params: { id: user.id } }">
                  
                  <span class="text nav-text t-deliveboo-green ml-1">link ristorante</span>
                </router-link>
  </div>
</div>
</template>

<script>
export default {
  name: "Card",
  props: ["user"],
  data() {
    return {};
  },
};
</script>

<style>
</style>