<template>
  <div
    class="promotionslider mt-lg-5 pt-lg-3"
    @mouseenter="stopAutoPlay"
    @mouseleave="autoPlay"
  >
    <div class="slidess">
      <div
        v-for="(slide, index) in slides"
        :key="slide.index"
        v-show="currentIndex === index"
      >
        <img :src="slide" alt="Slider Ad" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SliderPromotions",
  data() {
    return {
      slides: ["/img/pubb/2.png", "/img/pubb/1.png", "/img/pubb/3.png"],
      currentIndex: 0,
      intervalId: null,
    };
  },
  methods: {
    next() {
      if (this.currentIndex >= this.slides.length - 1) {
        this.currentIndex = 0;
      } else {
        this.currentIndex++;
      }
    },
    prev() {
      if (this.currentIndex <= 0) {
        this.currentIndex = this.slides.length - 1;
      } else {
        this.currentIndex--;
      }
    },
    autoPlay() {
      this.intervalId = setInterval(this.next, 2000);
    },
    stopAutoPlay() {
      clearInterval(this.intervalId);
    },
  },
  mounted() {
    this.autoPlay();
  },
};
</script>

<style lang="scss" scoped>
.promotionslider {
  height: auto;
  img {
    width: 100%;
  }
  i {
    font-size: 50px;
    color: #76bac5;
  }
  .slidess {
    height: auto;
    width: 100%;
  }
}
</style>