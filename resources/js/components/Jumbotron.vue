<template>
	<div class="container-fluid jumbotron">
		<div class="row">
			<div class="col-md-5 d-none d-md-block">
				<div class="delivery"></div>
			</div>
			<div class="col-md-7 col-12 slogan d-flex align-items-center">
				<h1>MAI VISTO IL CIBO CORRERE TANTO VELOCE</h1>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "Jumbotron",
};
</script>

<style lang="scss" scoped>
.jumbotron {
	background-color: #02b7b0;
	.delivery {
		height: 500px;
		background-image: url(/img/pubb/delivery.png);
		background-repeat: no-repeat;
		// background-size: contain;
		background-position: center;
	}
	.slogan {
		// height: 400px;
		h1 {
			font-size: 75px;
			font-family: "Koulen", cursive;
			text-shadow: 2px 2px 4px #888888;
		}
	}
}
</style>