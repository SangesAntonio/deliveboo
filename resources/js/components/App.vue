<template>
  <div class="container-fluid px-0">
    <header class="header d-flex justify-content-between px-4">
      <Navbar />
      <ModalCart :cart="cart" />
    </header>
    <div class="pt-5">
      <router-view
        @addProduct="addProduct"
        @removeProduct="removeProduct"
        @addQuantity="addQuantity"
      ></router-view>
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
  data() {
    return {
      currentCart: 0,
      cart: [],
      quantity:0,
    };
  },
  methods: {
    addProduct(product) {
      this.cart.push(product);
    },
    addQuantity(quantity) {
      this.quantity = quantity;
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