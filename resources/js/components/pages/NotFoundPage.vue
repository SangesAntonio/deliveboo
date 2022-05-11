<template>
	<div class="h-100 d-flex justify-content-center align-items-center text-muted flex-column py-5">
		<h3>404 | Not Found</h3>
		<button class="w-25 btn btn-info" @click="$router.back()">Indietro</button>
	</div>
</template>

<script>
export default {
	name: "NotFoundPage",
};
</script>

<style lang="scss" scoped>
</style>