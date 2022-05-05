<template>
<div class="container-fluid">
    <div class="row">

  <div class="col-12">
      <!-- <img :src="product.image" class="card-img-top" :alt="product.name" /> -->
          <div class="col-8">
            <h5 class="card-title">{{ product.name }}</h5>
        <p class="card-text">
          {{ product.description }}
        </p>
        <p class="card-text text-muted">{{ product.price }}€</p>
          </div>
        <div class="col-4">

        <div class="d-flex justify-content-between align-items-center">
          <!-- tasto minore -->
          <i
            @click="removeProductFromCart(product)"
            role="button"
            class="fa-solid fa-circle-minus fa-lg text-danger"
          ></i>

          <!-- bottone carrello -->
          <button class="btn mx-1">
            <i v-if="product.quantity <= 0" class="fa-solid fa-cart-arrow-down"> </i>
            <i v-else>{{ product.quantity }}</i>
          </button>

          <!-- tasto più -->
          <i
            @click="addProductToCart(product)"
            role="button"
            class="fa-solid fa-circle-plus fa-lg text-success"
          ></i>
      
        </div>
        </div>
        
     
      
    
  </div>
    </div>
</div>
</template>

<script>
export default {
  name: "CardDetail",
  props: ["product"],
  data() {
    return {
      
    };
  },
  methods: {
    // addProductToCart(product) {
    //   console.log(this.quantity ,'fuori')
    //   if(this.cart.length >=1){
    //     this.product.quantity++
    //     console.log(this.quantity ,'dentro if')
    //   } else{

    //     this.cart.push(product);
    //     this.product.quantity++
    //     console.log(this.quantity , 'questa è dentro else')
    //     console.log(this.cart);
    //     return this.$emit("addProduct", product);
    //   }
    // },
    // removeProductFromCart(product) {
    //   if(this.quantity > 0){

    //     this.quantity--
    //   }
    //   const position = this.cart.indexOf(product);
    //   if (position > -1) {
    //     this.cart.splice(position, 1);
    //   }
    //   console.log(this.cart);
    //   return this.$emit("removeProduct", product);
    // },
  },
};
</script>

<style>
</style>