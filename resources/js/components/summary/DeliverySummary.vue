<template>
  <div>
    <h3 class="mb-3 mt-5">Riepilogo ordine</h3>
    <div class="delivery-details">
      <div class="client name mb-3"><strong>Nome:</strong> Davide</div>
      <div class="client lastname mb-3"><strong>Cognome:</strong> Croce</div>
      <div class="client address mb-3">
        <strong>Indirizzo:</strong> Via Duomo 15, Livorno
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DeliverySummary",
};
</script>

<style lang="scss" scoped>
h3 {
  font-family: "Koulen", cursive;
  font-size: 15px;
}
.client strong {
  font-family: "Koulen", cursive;
  font-size: 10px;
}
</style>