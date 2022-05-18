<template>
	<div class="container-fluid px-0">
		<header class="header mb-5">
			<div>
				<div class="d-flex justify-content-end fixed-bottom d-block d-lg-none">
					<MobileNavbar />
				</div>
				<DesktopNavbar class="d-none d-lg-block slider-border" />
				<SliderPromotions class="slider-border" />
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
	font-family: "Montserrat", sans-serif;
}

.container-fluid {
	overflow: hidden;
}
</style>