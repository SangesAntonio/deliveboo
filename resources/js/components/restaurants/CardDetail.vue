<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="container">
          <div class="d-flex justify-content-end">
            <table class="table table-hover table-borderless">
              <thead>
                <tr>
                  <th scope="col">Prodotto</th>
                  <th scope="col">Quantità</th>
                  <th scope="col">Prezzo</th>
                  <th scope="col">Totale</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(product, index) in correctCart" :key="index">
                  <td v-if="product.quantity > 0" scope="col">
                    {{ product.name }}
                  </td>
                  <td v-if="product.quantity > 0">
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                      <!-- tasto minore -->
                      <i
                        @click="removeProductFromCart(product)"
                        role="button"
                        class="fa-solid fa-circle-minus fa-lg text-danger"
                      ></i>

                      {{ product.quantity }}
                      <!-- tasto più -->
                      <i
                        @click="addProductToCart(product)"
                        role="button"
                        class="fa-solid fa-circle-plus fa-lg text-success"
                      ></i>
                    </div>
                  </td>
                  <td v-if="product.quantity > 0">{{ product.price }}&euro;</td>
                  <td v-if="product.quantity > 0">
                    {{ product.price * product.quantity }}&euro;
                  </td>
                </tr>

                <tr>
                  <th colspan="3">Totale Ordine</th>
                  <th>{{ calcTotalPrice }}&euro;</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardDetail",
  props: ["cart"],
  data() {
    return {
      correctCart: [],
      total: 0,
    };
  },
  methods: {
    addProductToCart(product) {
      product.quantity++;

      this.cart.push(product);
    },
    removeProductFromCart(product) {
      if (product.quantity > 0) {
        product.quantity--;
        console.log(this.cart.indexOf(product), "eliminaziojne");

        return this.cart.splice(this.cart.indexOf(product), 1);
      } else {
      }
    },
  },
  computed: {
    calcTotalPrice() {
      // this.cart.forEach((item, i) => {
      //   this.total += item.price;

      // });
      // return this.total;
      this.total = this.cart.reduce(
        (total, lineItem) => total + Number(lineItem.price),
        0
      );
      return this.total;
    },
    getSingleProduct() {
      this.correctCart = new Set(this.cart.filter((numb) => numb === numb));
      console.log(this.correctCart);
      return this.correctCart;
    },
    setQuantityCart() {
      return this.cart.length;
    },
  },
};
</script>

<style>
</style>