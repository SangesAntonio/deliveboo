<template>
    <div>
        <h3 class="mb-3">
            I tuoi piatti:
        </h3>
        <table class="table table-borderless">
            <thead>
                <tr>
                  <th scope="col">Quantita'</th>
                  <th scope="col">Nome del Piatto</th>
                  <th scope="col">Prezzo</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">4</th>
                <td>Pizza Margherita</td>
                <td>20€</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Pizza Capricciosa</td>
                <td>12€</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Pizza Diavola</td>
                <td>18€</td>
              </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'ProductSummary',
}
</script>

<style lang="scss" scoped>
h3{
    font-family: 'Koulen', cursive;
    font-size: 30px;
}
thead{
    font-family: 'Koulen', cursive;
    font-size: 20px;
}
</style>