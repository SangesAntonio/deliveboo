<template>
  <div class="container-fluid px-0">
    <header class="header px-4">
      <DesktopNavbar class="d-none d-lg-block fixed-top" />
      <div class="d-flex justify-content-end fixed-bottom d-block d-lg-none">
        <Navbar />
      </div>
      <!-- <ModalCart class="fixed-bottom m-3" /> -->
    </header>
    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import DesktopNavbar from "./DesktopNavbar.vue";
import ModalCart from "./ModalCart.vue";
export default {
  name: "App",
  components: {
    Navbar,
    ModalCart,
    DesktopNavbar,
  },
};
</script>

<style lang="scss">
</style>