<template>
  <div class="card" style="width: 18rem;">
  <img class="card-img-top"  alt="Card image cap">  <!--//inserire src qui! -->
  <div class="card-body">
    <p class="card-text">
      <ul>
        <li class="text-black">{{user.address}}</li>
        <li class="text-black">{{user.restaurant_name}}</li>
        <li class="text-black">{{user.address}}</li>
      </ul>
    </p>
  </div>
</div>
</template>

<script>
export default {
    name:'Card',
    props: ["user"],
}
</script>

<style>
</style>