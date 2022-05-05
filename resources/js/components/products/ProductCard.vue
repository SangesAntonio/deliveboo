<template>
  <div class="col-4 py-3">
    <div class="card" style="width: 18rem">
      <img :src="product.image" class="card-img-top" :alt="product.name" />
      <div class="card-body">
        <h5 class="card-title">{{ product.name }}</h5>
        <p class="card-text">
          {{ product.description }}
        </p>
        <p class="card-text text-muted">{{ product.price }}€</p>
      </div>
      <div
        class="card-footer d-flex justify-content-between align-items-center"
      >
        <div class="d-flex justify-content-between align-items-center">
          <!-- tasto minore -->
          <i
            @click="removeProductFromCart(product.id)"
            role="button"
            class="fa-solid fa-circle-minus fa-lg text-danger"
          ></i>

          <!-- bottone carrello -->
          <button class="btn mx-1">
            <i v-if="!cart.length" class="fa-solid fa-cart-arrow-down"> </i>
            <i v-else>{{ cart.length }}</i>
          </button>

          <!-- tasto più -->
          <i
            @click="addProductToCart(product.id)"
            role="button"
            class="fa-solid fa-circle-plus fa-lg text-success"
          ></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductCard",
  props: ["product"],
  data() {
    return {
      cart: [],
    };
  },
  methods: {
    addProductToCart(id) {
      this.cart.push(id);
      console.log(this.cart);
      return this.$emit("addProduct", id);
    },
    removeProductFromCart(id) {
      const position = this.cart.indexOf(id);
      if (position > -1) {
        this.cart.splice(position, 1);
      }
      console.log(this.cart);
      return this.$emit("removeProduct", id);
    },
  },
};
</script>

<style>
</style>