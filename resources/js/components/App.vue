<template>
  <div class="container-fluid px-0">
    <header class="header d-flex justify-content-between px-4">
      <Navbar />
      <ModalCart />
    </header>
    <div class="pt-5">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import ModalCart from "./ModalCart.vue";
export default {
  name: "App",
  components: {
    Navbar,
    ModalCart,
  },
};
</script>

<style lang="scss">
</style>