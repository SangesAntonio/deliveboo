<template>
    <div class="promotionslider">
        <div class="slidess">
            <div v-for="(slide,index) in slides" :key="slide.index" v-show="currentIndex === index">
                <img :src="slide" alt="">

                <button @click="prev"><i class="fa-solid fa-circle-chevron-left"></i></button>
                <button @click="next"><i class="fa-solid fa-circle-chevron-right"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SliderPromotions",
    data(){
        return{
            slides: [
                'https://drive.google.com/file/d/1R0E8esOhPV30fPv6tXensHMpvZj2ZVOC/view?usp=sharing',
                'https://drive.google.com/file/d/1AUkcAJ1ofZD6Ztc85RYN2SPS8Pe9Z2nQ/view?usp=sharing',
                'https://drive.google.com/file/d/1tBxlsyp1_0_XVyLFjMVxFCRRU6y8llep/view?usp=sharing',
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
    }
}

</style>