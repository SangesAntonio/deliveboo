<template>
  <div v-if="!payment" class="container">
    <h1>Completa l'ordine</h1>
    <div class="form">
      <form>
        <div class="form-row align-items-center py-4">
          <div class="col-sm-4 my-1">
            <label class="sr-only" for="name">Nome</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="name"
              placeholder="Nome"
            />
          </div>
          <div class="col-sm-4 my-1">
            <label class="sr-only" for="lastname">Cognome</label>
            <input
              type="text"
              class="form-control"
              id="lastname"
              name="lastname"
              placeholder="Cognome"
            />
          </div>
        </div>
        <div class="col-sm-10 mb-4 p-0">
          <label for="email" class="sr-only">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Email"
          />
        </div>
        <div class="form-row my-4">
          <div class="col-7">
            <input
              type="text"
              class="form-control"
              placeholder="Citta'"
              name="city"
            />
          </div>
          <div class="col">
            <input
              type="text"
              class="form-control"
              placeholder="Via"
              name="address"
            />
          </div>
        </div>
        <div class="col-12 d-flex justify-content-between">
          <div class="col-4 d-flex justify-content-end my-1">
            <div @click="gotToCart" class="btn btn-secondary">
              Torna al carrello
            </div>
          </div>
          <div class="col-4 d-flex justify-content-end my-1">
            <div @click="gotTopayment" class="btn btn-primary">
              Vai al Pagamento!
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <PaymentCheckout v-else />
</template>

<script>
import PaymentCheckout from "./PaymentCheckout.vue";
export default {
  name: "OrderForm",
  components: {
    PaymentCheckout,
  },
  data() {
    return {
      checkout: true,
      payment: false,
    };
  },
  methods: {
    gotToCart() {
      this.checkout = false;
      return this.$emit("gotToCart", this.checkout);
    },
    gotTopayment() {
      this.payment = true;
    },
  },
};
</script>

<style lang="scss" scoped>
.container {
  h1,
  button {
    font-family: "Koulen", cursive;
  }
  button {
    font-size: 18px;
  }
  ::placeholder {
    font-size: 16px;
    font-family: "Koulen", cursive;
  }
}
</style>