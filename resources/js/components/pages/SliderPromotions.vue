<template>
    <div class="promotionslider">
        <div class="slidess">
            <div v-for="(slide,index) in slides" :key="slide.index" v-show="currentIndex === index">
                <img :src="slide" alt="">
            </div>
            <button @click="prev"><i class="fa-solid fa-circle-chevron-left"></i></button>
            <button @click="next"><i class="fa-solid fa-circle-chevron-right"></i></button>
        </div>
    </div>
</template>

<script>
export default {
    name: "SliderPromotions",
    data(){
        return{
            slides: [
                '/img/pubb/2.png',
                '/img/pubb/1.png',
                '/img/pubb/3.png',
            ],
            currentIndex: 0,
        }
       
    },
    methods: {
        next(){
            if(this.currentIndex >= this.slides.length - 1){
                this.currentIndex = 0;
            }else{
                this.currentIndex++;
            }
        },
        prev(){
            if(this.currentIndex <= 0){
                this.currentIndex = this.slides.length - 1;
            }else{
                this.currentIndex--;
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.promotionslider{
    height: 400px;
    img{
        height: 400px;
        width: 700px;
    }
    i{
        font-size: 50px;
        color: #76BAC5;
    }
    .slidess{
        height: 400px;
        width: 700px;
        position: relative;
        button{
            border: none;
            background-color: transparent;
            .fa-circle-chevron-left{
                position: absolute;
                top: 50%;
                left: -10%;
            }
            .fa-circle-chevron-right{
                position: absolute;
                top: 50%;
                right: -10%;
            }
        }
    }
}

</style>