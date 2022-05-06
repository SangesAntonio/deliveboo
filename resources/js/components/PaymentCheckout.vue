<template>
    <div class="container">

    <br>

    <h1>Braintree Demo</h1>

    <v-braintree 
      v-if="showDropIn"
      authorization="sandbox_4x2fxjmf_q5k7r9z79n9kztxr"
        
      :paypal="{flow: 'vault'}"
      :three-d-secure="false"
      :three-d-secure-parameters="{
        amount: 100, 
        email: 'francois@witify.io', 
        billingAddress: {
          givenName: 'John',
          surname: 'Doe',
          phoneNumber: '515 515 1234',
          streetAddress: '485 boul. dagenais E',
          extendedAddress: '1',
          locality: 'Laval',
          region: 'QC',
          postalCode: 'h7m5z5',
          countryCodeAlpha2: 'CA'
        }
      }"
      @load="onLoad"
      @loadFail="onLoadFail"
      @success="onSuccess"
      @error="onError"
    >
      <template id="payment"  v-slot:button="slotProps">
        <input type="submit"  @click="slotProps.submit" class="btn btn-warning" value="Pay now!!" />
      </template>
    </v-braintree>

    <br>

    <button class="btn">
      Clear Payment Selection
    </button>

    <br>
    <br>

    <button @click="deleteInstance" class="btn btn-danger">
      Delete instance
    </button>
  </div>
</template>

<script>
import { add } from "@braintree/class-list"

export default {
    name :'payment',
    data () {
    return {
      instance: null,
      showDropIn: true,
    }
  },
  methods: {
    onLoad (instance) {
      this.instance = instance;
    },
    onLoadFail (instance) {
      console.error('Load fail', instance);
    },
    onSuccess (payload) {
      console.log("Success!", payload.nonce);
      this.modalSuccess();
      setTimeout(() => {
        this.$router.push('Home')
      
      }, 3100);
    },
    onError (error) {
      console.error("Error:", error);
      this.modalWrong()
      
    },
    clearPaymentSelection () {
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
          this.$swal({title: 'Deliveboo',
      text: 'Pagamento effettuato con successo',
      imageUrl: '/img/pubb/clipp-delivery-kradac.gif',
      imageWidth: 500,
      imageHeight: 320,
      imageAlt: 'Pagamento effettuato con successo',
      background:'#00CCBC',
      timer: 3000,
      
      });
    },
    modalWrong() {
      // Use sweetalert2
      this.$swal({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href="">Why do I have this issue?</a>',
        background:'#00CCBC',
        timer: 3000,
  });
    },
    ritardo(){
      
    }
}
}
   
  
  


</script>

<style lang="scss" scoped>

</style>