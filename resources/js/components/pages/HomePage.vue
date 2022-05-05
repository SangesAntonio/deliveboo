<template>
  <div class="homepage">
    <SliderPromotions class="pb-4" />
    <!-- <p class="not-to-lose d-none d-lg-block">Da non perdere</p> -->
    <div>
      <div class="container categorie-ristoranti my-5">
        <div class="row justify-content-around">
          <div class="col-6 col-md-4 col-lg-3">Internazionale</div>
          <div class="col-6 col-md-4 col-lg-3">Cinese</div>
          <div class="col-6 col-md-4 col-lg-3">Giapponese</div>
          <div class="col-6 col-md-4 col-lg-3">Messicano</div>
          <div class="col-6 col-md-4 col-lg-3">Indiano</div>
          <div class="col-6 col-md-4 col-lg-3">Pesce</div>
          <div class="col-6 col-md-4 col-lg-3">Carne</div>
          <div class="col-6 col-md-4 col-lg-3">Pizza</div>
          <div class="col-6 col-md-4 col-lg-3">Cucina Mediterranea</div>
          <div class="col-6 col-md-4 col-lg-3">Dolci</div>
        </div>
      </div>
    </div>
    <Jumbotron class="d-none d-lg-block" />
  </div>
</template>

<script>
import SliderPromotions from "./SliderPromotions.vue";
import Jumbotron from "../Jumbotron.vue";

export default {
  name: "HomePage",
  components: {
    SliderPromotions,
    Jumbotron,
  },
};
</script>
<style lang="scss" scoped>
.slider-promozioni {
  background-color: lightblue;
  background-image: url(/img/pubb/promotions-bg.jpg);
  background-size: cover;
  position: relative;
  // img{
  //     height: 400px;
  //     box-shadow: 2px 2px 4px #1f1f1f;
  //     position: relative;
  // }
  .not-to-lose {
    background-color: #ffc562;
    font-family: "Koulen", cursive;
    font-size: 30px;
    padding: 5px 15px;
    border-radius: 30px;
    transform: rotate(-25deg);
    border: solid 2px #ffa500;
    text-shadow: 2px 2px 4px #888888;
    box-shadow: 2px 2px 4px #1f1f1f;
    position: absolute;
    top: 10%;
    left: 15%;
  }
}
.categorie-ristoranti {
  font-size: 20px;
  .col-6 {
    margin: 20px;
    padding: 10px;
    background-color: orange;
    text-align: center;
    border-radius: 10px;
    font-family: "Koulen", cursive;
    font-weight: 600;
    box-shadow: 2px 2px 4px #1f1f1f;
  }
}
</style>