<template>
  <div>
    <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')"
      >Carrello</b-button
    >

    <b-modal id="bv-modal-example" hide-footer>
      <template #modal-title> </template>
      <div class="d-block text-center">
        <CardDetail
          v-for="(product, index) in correctCart"
          :key="index"
          :product="product"
          :correctCart="correctCart"
        />
      </div>
      <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')"
        >Chiudi</b-button
      >
      <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')"
        >Check out</b-button
      >
    </b-modal>
  </div>
</template>

<script>
import ProductCard from "./products/ProductCard.vue";
import CardDetail from "./restaurants/CardDetail.vue";

export default {
  components: { ProductCard, CardDetail },
  name: "ModelCart",
  props: ["cart"],
  data() {
    return {
      correctCart: [],
    };
  },
  methods: {},
  computed: {
    getQuantity() {
      this.correctCart = new Set(this.cart.filter((numb) => numb === numb));
      console.log(this.correctCart);
      return this.correctCart;
    },
  },
};
</script>

<style lang="scss">
@import "../../sass/cartmodal.scss";
</style>
