<template>
  <div class="container-fluid px-0">
    <header class="header mb-5">
      <div>
        <SliderPromotions class="slider-border" />
        <DesktopNavbar class="d-none d-lg-block slider-border" />
      </div>
      <div class="d-flex justify-content-end fixed-bottom d-block d-lg-none">
        <MobileNavbar />
      </div>
    </header>
    <div>
      <router-view></router-view>
    </div>
    <Footer class="pb-5 pb-lg-0" />
  </div>
</template>

<script>

import MobileNavbar from "./MobileNavbar.vue";
import SliderPromotions from "./SliderPromotions.vue";
import DesktopNavbar from "./DesktopNavbar.vue";
import Footer from "./Footer.vue";
export default {
	name: "App",
	components: {
		MobileNavbar,
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