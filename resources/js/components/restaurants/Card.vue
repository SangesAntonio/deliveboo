<template>
<div class="col-2">
  <div class="card">
  <img class="card-img-top" :src="`/storage/${user.image}`" alt="Card image cap">  <!--//inserire src qui! -->
  <div class="card-body">
    <p class="card-text">
      <ul>
        <li class="text-black">{{user.address}}</li>
        <li class="text-black">{{user.restaurant_name}}</li>
        <li class="text-black">{{user.address}}</li>
        <ul v-for="category in user.categories" :key="category.id">
          <li>
            {{category.name}}
          </li>
        </ul>
      </ul>
    </p>
  </div>
  </div>
</div>
</template>

<script>
export default {
    name:'Card',
    props: ["user"],
    data(){
      return{

      };
    },
}
</script>

<style>
</style>