<template>
  <div class="jumbotron">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 d-none d-md-block">
          <div class="delivery"></div>
        </div>
        <div class="col-md-7 col-12 slogan d-flex align-items-center">
          <h1>MAI VISTO IL CIBO CORRERE TANTO VELOCE</h1>
        </div>
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
  //   height: 500px;
  //   width: 100%;
  background-color: #02b7b0;
  .delivery {
    height: 400px;
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
      text-shadow: 2px 2px 4px #888888;
    }
  }
}
</style>