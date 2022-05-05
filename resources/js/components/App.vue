<template>
  <div class="container-fluid px-0">
    <header class="header px-4">
      <DesktopNavbar class="d-none d-lg-block fixed-top" />
      <div class="d-flex justify-content-end fixed-bottom d-block d-lg-none">
        <Navbar />
      </div>
      <ModalCart :cart="cart" />
    </header>
    <div>
      <router-view
        @addProduct="addProduct"
        @removeProduct="removeProduct"
      ></router-view>
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
  data() {
    return {
      currentCart: 0,
      cart: [],
    };
  },
  methods: {
    addProduct(product) {
      this.cart.push(product);
    },
    removeProduct(product) {
      const position = this.cart.indexOf(product);
      if (position > -1) {
        this.cart.splice(position, 1);
      }
    },
  },
};
</script>

<style lang="scss">
</style>