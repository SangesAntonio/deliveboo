<template>
  <div class="container">
    <br />

    <h1>Braintree Demo</h1>

    <v-braintree
      v-if="showDropIn"
      authorization="sandbox_4x2fxjmf_q5k7r9z79n9kztxr"
      :paypal="{ flow: 'vault' }"
      :three-d-secure="false"
      :three-d-secure-parameters="{
        amount: 100,
        email: 'francois@witify.io',
        billingAddress: {
          givenName: 'John',
          surname: 'Doe',

          locality: 'Laval',
          streetAddress: '485 boul. dagenais E',
        },
      }"
      @load="onLoad"
      @loadFail="onLoadFail"
      @success="onSuccess"
      @error="onError"
    >
      <template id="payment" v-slot:button="slotProps">
        <input
          type="submit"
          @click="slotProps.submit"
          class="btn btn-warning"
          value="Paga Ora!!"
        />
      </template>
    </v-braintree>

    <br />

    <br />
    <div class="container">
      <h3 class="mb-3 mt-5">Riepilogo dati</h3>
      <div class="row">
        <div class="col-6">
          <div class="client name mb-3">
            <strong>Nome:</strong> {{ formOrder.name }} {{ formOrder.lastname }}
          </div>
        </div>
        <div class="col-6"></div>
        <div class="client address mb-3">
          <strong>Indirizzo:</strong> {{ formOrder.address }}
          <strong>Email:</strong> {{ formOrder.email }}
        </div>
        <div class="col">
          <h1><strong>Totale ordine:</strong>{{ total }}&euro;</h1>
        </div>
      </div>
    </div>
    <br />

    <button @click="deleteInstance" class="btn btn-danger">
      Svuota i campi
    </button>
  </div>
</template>

<script>
import { add } from "@braintree/class-list";

export default {
  name: "payment",
  props: ["formOrder", "total", "cart"],
  data() {
    return {
      instance: null,
      showDropIn: true,
    };
  },
  computed: {},
  methods: {
    onLoad(instance) {
      this.instance = instance;
    },
    onLoadFail(instance) {
      console.error("Load fail", instance);
    },
    onSuccess(payload) {
      console.log("Success!", payload.nonce);
      this.modalSuccess();
      setTimeout(() => {
        this.$router.push({ path: "/home" });
      }, 3100);
    },
    onError(error) {
      console.error("Error:", error);
      this.modalWrong();
    },
    clearPaymentSelection() {
      if (this.instance != null) {
        this.instance.clearSelectedPaymentMethod();
      }
    },
    deleteInstance() {
      this.showDropIn = false;
      setInterval(() => {
        this.showDropIn = true;
      }, 1000);
    },

    modalSuccess() {
      // Use sweetalert2
      this.$swal({
        title: "Deliveboo",
        text: "Pagamento effettuato con successo",
        imageUrl: "/img/pubb/clipp-delivery-kradac.gif",
        imageWidth: 500,
        imageHeight: 320,
        imageAlt: "Pagamento effettuato con successo",
        background: "#00CCBC",
        timer: 3000,
      });
    },
    modalWrong() {
      // Use sweetalert2
      this.$swal({
        icon: "error",
        title: "Oops...",
        text: "Something went wrong!",
        footer: '<a href="">Why do I have this issue?</a>',
        background: "#00CCBC",
        timer: 3000,
      });
    },
    ritardo() {},
  },
};
</script>

<style lang="scss" scoped>
</style>