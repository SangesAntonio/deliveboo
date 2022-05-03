<template>
	<div class="container-fluid px-0">
		    <Navbar/>
		<!-- <div class="row justify-content-center">
			<main class="col-12 my-4">
				<h1>VUE HOME</h1> -->
				<!-- <router-link to="/payment">payment </router-link> -->
				<!-- <router-view></router-view> -->
			<!-- </main>
		</div> -->
	</div>
</template>

<script>
import Navbar from './Navbar.vue';
export default {
	name: "App",
	components: {
        Navbar
    }
};
</script>

<style lang="scss" scoped>
</style>