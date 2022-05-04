<template>
  <div class="container-fluid px-0">
    <Navbar />
    <div class="pt-5">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
export default {
  name: "App",
  components: {
    Navbar,
  },
};
</script>

<style lang="scss">
</style>