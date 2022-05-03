<template>
	<div class="container-fluid px-0">
		<div class="row justify-content-center">
			<main class="col-12 my-4">
				<h1>VUE HOMEPAGE</h1>
				<!-- <router-link to="/payment">payment </router-link> -->
				<router-view></router-view>
			</main>
		</div>
	</div>
</template>

<script>
export default {
	name: "App",
};
</script>

<style lang="scss" scoped>
</style>