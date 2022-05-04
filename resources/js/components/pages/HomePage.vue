<template>
<div class="homepage">
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="delivery"></div>
                </div>
                <div class="col-7 slogan d-flex align-items-center">
                    <h1>MAI VISTO IL CIBO CORRERE TANTO VELOCE</h1>
                </div>
            </div>
        </div>
    </div>
    <div class=" container categorie-ristoranti py-5">
        <div class="row justify-content-around ">
            <div class="col-2">Internazionale</div>
            <div class="col-2">Cinese</div>
            <div class="col-2">Giapponese</div>
            <div class="col-2">Messicano</div>
            <div class="col-2">Indiano</div>
            <div class="col-2">Pesce</div>
            <div class="col-2">Carne</div>
            <div class="col-2">Pizza</div>
            <div class="col-2">Cucina Mediterranea</div>
            <div class="col-2">Dolci</div>
        </div>
    </div>
    <div class="slider-promozioni d-flex justify-content-center align-items-center">
        <SliderPromotions/>
        <p class="not-to-lose">Da non perdere</p>
    </div>
</div>
</template>

<script>
import SliderPromotions from './SliderPromotions.vue'

export default {
    name: "HomePage",
    components: {
        SliderPromotions,
    }
}
</script>
<style lang="scss" scoped>
.homepage{
    margin-top: 100px;
}
.jumbotron{
    height: 500px;
    width: 100%;
    background-color: #02B7B0;
    .delivery{
        height: 400px;
        background-image: url(https://i.imgur.com/1e7JyNQ.png);
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
    }
    .slogan{
        height: 400px;
        h1{
            font-size: 75px;
            font-family: 'Koulen', cursive;
            text-shadow: 2px 2px 4px #888888;
        }
    }
}
.slider-promozioni{
    height: 500px;
    width: 100%;
    background-color: lightblue;
    background-image: url(https://i.imgur.com/KKM8VK2.jpg);
    background-size: cover;
    position: relative;
    // img{
    //     height: 400px;
    //     box-shadow: 2px 2px 4px #1f1f1f;
    //     position: relative;
    // }
    .not-to-lose{
        background-color: #FFC562;
        font-family: 'Koulen', cursive;
        font-size: 30px;
        padding: 5px 15px;
        border-radius: 30px;
        transform: rotate(-25deg);
        border: solid 2px #FFA500;
        text-shadow: 2px 2px 4px #888888;
        box-shadow: 2px 2px 4px #1f1f1f;
        position: absolute;
        top: 10%;
        left: 15%;
    }
}
.categorie-ristoranti{
    font-size: 20px;
    .col-2{
        margin: 20px;
        padding: 10px;
        background-color: orange;
        text-align: center;
        border-radius: 10px;
        font-family: 'Koulen', cursive;
        font-weight: 600;
        box-shadow: 2px 2px 4px #1f1f1f;
    }
}
</style>