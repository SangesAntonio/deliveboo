<template>
	<div id="loader" class="d-flex flex-column">
		<div>
			<img
				id="img-loader"
				:src="'./img/pubb/deliveboo_loader.gif'"
				alt="loading image"
			/>
		</div>
	</div>
</template>

<script>
export default {
	name: "Loader",
};
</script>

<style>
#loader {
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: rgba(0, 0, 0, 0.5);
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 1;
}

#img-loader {
	width: 300px;
	height: 300px;
}
</style>