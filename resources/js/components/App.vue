<template>
  <div class="container-fluid px-0">
    <header class="header px-4">
      <DesktopNavbar class="d-none d-lg-block fixed-top" />
      <div class="d-flex justify-content-end fixed-bottom d-block d-lg-none">
        <Navbar />
      </div>
    </header>
    <div>
      <router-view></router-view>
    </div>
    <Footer/>
  </div>
</template>

<script>
import Navbar from "./Navbar.vue";
import DesktopNavbar from "./DesktopNavbar.vue";
import Footer from "./Footer.vue";
export default {
  name: "App",
  components: {
    Navbar,
    DesktopNavbar,
    Footer,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

<style scoped lang="scss">
.container-fluid {
  overflow-y: hidden;
}
</style>