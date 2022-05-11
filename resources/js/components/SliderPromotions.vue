<template>
  <div
    class="promotionslider"
    @mouseenter="stopAutoPlay"
    @mouseleave="autoPlay"
  >
    <div class="slides">
      <!-- Slider Desktop -->
      <div class="d-none d-lg-block slider-border shadow">
        <div
          v-for="(slide, index) in slides"
          :key="slide.index"
          v-show="currentIndex === index"
        >
          <div class="d-flex justify-content-center">
            <img
              id="slider-img"
              class="img-fluid"
              :src="slide"
              alt="Slider Ad"
            />
          </div>
        </div>
      </div>

      <!-- Slider Mobile -->
      <div class="d-block d-lg-none slider-border shadow">
        <div
          v-for="(slide, index) in mobileSlides"
          :key="slide.index"
          v-show="currentIndex === index"
        >
          <div class="d-flex justify-content-center">
            <img
              id="slider-img"
              class="img-fluid"
              :src="slide"
              alt="Slider Ad"
            />
          </div>
          <div
            class="
              bg-light
              p-2
              shadow
              d-flex
              justify-content-center
              align-items-center
            "
          >
            <img
              id="logo"
              :src="'./img/pubb/deliveboo_loader.gif'"
              class="img-fluid mr-3"
              alt="Logo Deliveboo"
            />
            <h2 class="t-deliveboo-green fw-bold mb-0">DELIVEBOO</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SliderPromotions",
  data() {
    return {
      slides: [
        "/img/pubb/slider/ad_1_desktop.png",
        "/img/pubb/slider/ad_2_desktop.png",
        "/img/pubb/slider/ad_3_desktop.png",
        "/img/pubb/slider/2_desktop.png",
        "/img/pubb/slider/1_desktop.png",
        "/img/pubb/slider/3_desktop.png",
      ],
      mobileSlides: [
        "/img/pubb/slider/ad_1.png",
        "/img/pubb/slider/ad_2.png",
        "/img/pubb/slider/ad_3.png",
        "/img/pubb/slider/2.png",
        "/img/pubb/slider/1.png",
        "/img/pubb/slider/3.png",
      ],
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
#logo {
  width: 50px;
}

#slider-img {
  display: flex;
  justify-content: center;
  flex-grow: 1;
}

.fw-bold {
  font-weight: bold;
}

h2 {
  font-family: "Koulen", cursive;
}

.slides {
  height: auto;
  width: 100%;
}
</style>