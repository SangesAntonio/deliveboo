<template>
  <div>
    <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')"
      >Carrello</b-button
    >

    <b-modal id="bv-modal-example" hide-footer>
      <template #modal-title> </template>
      <div class="d-block text-center">
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
            <tr>
              <td scope="col">Margherita</td>
              <td>2</td>
              <td>4&euro;</td>
              <td>8&euro;</td>
            </tr>

            <tr>
              <th colspan="3">Totale Ordine</th>
              <th>12&euro;</th>
            </tr>
          </tbody>
        </table>
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
export default {
  name: "ModelCart",
  props: ["cart"],
  data() {
    return {};
  },
  computed: {
    getQuantity() {
      console.log(product.price , 'sono il console.log di product.price')
      let cart = {};
      for (let i in this.cart) {
        let key = this.cart[i].id;
        cart[key] = {
          id: key,
          count: cart[key] && cart[key].count ? cart[key].count + 1 : 1,
          totalPrice: parseInt(cart[key] && cart[key].count ? cart[key].count + 1 : 1) * parseInt(product.price),
        };
          // inserire qui logica totale prezzo



      }
      return Object.values(cart);
      
    },
  },
  mounted() {
    console.log(this.getQuantity);
    console.log(this.getTotalPrice);
  },
};
</script>

<style lang="scss">
@import "../../sass/cartmodal.scss";
</style>