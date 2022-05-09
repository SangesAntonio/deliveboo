<template>
  <div>
    <b-button
      id="show-btn"
      variant="primary"
      @click="
        getSingleProduct(), calcTotalPrice(), $bvModal.show('bv-modal-example')
      "
      ><i class="fa-solid fa-cart-shopping position-relative"></i
      ><span>
        {{ cart.length }}
      </span></b-button
    >
    <b-modal v-if="!checkout" id="bv-modal-example" hide-footer>
      <template #modal-title> </template>
      <div class="d-block text-center">
        <CardDetail :cart="cart" :total="total" :correctCart="correctCart" />
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
        <OrderForm @gotToCart="showCart" :total="total" :cart="correctCart" />
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
      correctCart: [],
      total: 0,
    };
  },
  methods: {
    gotToFormOrder() {
      this.checkout = true;
    },
    showCart() {
      this.checkout = false;
    },
    getSingleProduct() {
      this.correctCart = new Set(this.cart.filter((numb) => numb === numb));
    },
    calcTotalPrice() {
      this.total = this.cart.reduce(
        (total, lineItem) => total + Number(lineItem.price),
        0
      );
    },
  },
  computed: {},
};
</script>

<style lang="scss">
@import "../../sass/cartmodal.scss";
</style>
