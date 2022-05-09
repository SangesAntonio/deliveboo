<template>
  <div class="container-fluid px-0">
    <header class="header mb-5">
      <div>
        <!-- Rimpicciolire immagini in desktop -->
        <SliderPromotions class="slider-border" />
        <DesktopNavbar class="d-none d-lg-block slider-border" />
      </div>
      <div class="d-flex justify-content-end fixed-bottom d-block d-lg-none">
        <Navbar />
      </div>
    </header>
    <div>
      <router-view></router-view>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import SliderPromotions from "./SliderPromotions.vue";
import DesktopNavbar from "./DesktopNavbar.vue";
import Footer from "./Footer.vue";
export default {
  name: "App",
  components: {
    Navbar,
    DesktopNavbar,
    Footer,
    SliderPromotions,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
body {
  font-family: "Koulen", cursive;
}

.slider-border {
  box-shadow: 0px 10px 0px #fff;
}

.container-fluid {
  overflow: hidden;
}
</style>