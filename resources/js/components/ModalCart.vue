<template>
  <div>
    <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')"
      >Carrello</b-button
    >

    <b-modal id="bv-modal-example" hide-footer>
      <template #modal-title> </template>
      <div class="d-block text-center">
        <CardDetail  v-for="(product , index) in correctCart" :key="index" :product="product"/>
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
  components: { ProductCard , CardDetail},
  name: "ModelCart",
  props: ["cart" , "quantity" ],
  data() {
    return {
      correctCart:[]
    };
  },
  methods: {
  },
  computed: {
    
    getQuantity() {
      let result =  this.cart;
    },

    
  },
  }
</script>

<style lang="scss">
@import "../../sass/cartmodal.scss";
</style>
