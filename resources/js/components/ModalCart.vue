<template>
  <div>
    <b-button
      id="show-btn"
      variant="primary"
      @click="$bvModal.show('bv-modal-example')"
      ><i class="fa-solid fa-cart-shopping position-relative"></i
      ><span v-if="cart.length">
        {{ cart.length }}
      </span></b-button
    >
    <b-modal v-if="!checkout" id="bv-modal-example" hide-footer>
      <template #modal-title> </template>
      <div class="d-block text-center">
        <CardDetail :cart="cart" @totalPrice="totalPrice" />
      </div>
      <b-button
        class="mt-3"
        variant="warning"
        block
        @click="$bvModal.hide('bv-modal-example')"
        >Chiudi</b-button
      >
      <div>
        <b-button v-if="!cart.length" variant="success" class="mt-3" block
          >inserisci un prodotto</b-button
        >
        <b-button
          v-else
          variant="success"
          class="mt-3"
          block
          @click="gotToFormOrder"
          >Check out</b-button
        >
      </div>
    </b-modal>
    <b-modal v-else id="bv-modal-example" hide-footer>
      <template #modal-title> </template>

      <div class="d-block text-center">
        <OrderForm @gotToCart="showCart" :total="total" />
      </div>
    </b-modal>
  </div>
</template>

<script>
import ProductCard from "./products/ProductCard.vue";
import CardDetail from "./restaurants/CardDetail.vue";
import OrderForm from "./OrderForm.vue";

export default {
  components: { ProductCard, CardDetail, OrderForm },
  name: "ModelCart",
  props: ["cart"],
  data() {
    return {
      checkout: false,
      total: 0,
    };
  },
  methods: {
    totalPrice(price) {
      this.total = price;
    },
    gotToFormOrder() {
      this.checkout = true;
    },
    showCart() {
      this.checkout = false;
    },
  },
  computed: {
    calcTotalPrice() {
      this.total = this.cart.reduce(
        (total, lineItem) => total + Number(lineItem.price),
        0
      );
      return this.total;
    },
  },
};
</script>

<style lang="scss">
@import "../../sass/cartmodal.scss";
</style>
