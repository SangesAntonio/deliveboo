<template>
  <div class="container-fluid jumbotron">
    <div class="row align-items-center justify-content-around">
      <div class="col-md-5 col-12">
        <div class="delivery"></div>
      </div>
      <div class="col-md-7 col-12 slogan d-flex align-items-center text-center">
        <h1>
          MAI VISTO IL CIBO CORRERE TANTO
          <span class="text-white"><strong>VELOCE!</strong></span>
          <div class="h1 mt-3">
            Scegli <span class="text-white fw-bold">DELIVEBOO</span>!
          </div>
        </h1>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Jumbotron",
};
</script>

<style lang="scss" scoped>
.jumbotron {
  background-color: #ff8a66;
  .delivery {
    height: 500px;
    background-image: url(/img/pubb/delivery.png);
    background-repeat: no-repeat;
    // background-size: contain;
    background-position: center;
  }
  .slogan {
    // height: 400px;
    h1 {
      font-size: 75px;
      font-family: "Koulen", cursive;
      text-shadow: 2px 2px 4px #ff0000;
    }
  }
}
</style>