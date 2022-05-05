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
              <td scope="col">Hot Dog</td>
              <td>1</td>
              <td>3&euro;</td>
              <td>3&euro;</td>
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
};
</script>

<style lang="scss">
@import "../../sass/cartmodal.scss";
</style>