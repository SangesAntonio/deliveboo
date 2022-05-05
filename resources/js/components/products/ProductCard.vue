<template>
	<div class="col-12 col-md-6 col-xl-4 py-3">
		<div class="card">
			<img :src="product.image" class="card-img-top" :alt="product.name" />
			<div class="card-body">
				<h5 class="card-title">{{ product.name }}</h5>
				<p class="card-text">
					{{ product.description }}
				</p>
				<p class="card-text text-muted">{{ product.price }}€</p>
			</div>
			<div
				class="card-footer d-flex justify-content-between align-items-center"
			>
				<div class="d-flex justify-content-between align-items-center">
					<!-- tasto minore -->
					<i
						@click="removeProductFromCart(product)"
						role="button"
						class="fa-solid fa-circle-minus text-danger"
					></i>

					<!-- bottone carrello -->
					<button class="btn mt-0">
						<i v-if="!cart.length" class="fa-solid fa-cart-arrow-down"> </i>
						<i v-else>{{ cart.length }}</i>
					</button>

					<!-- tasto più -->
					<i
						@click="addProductToCart(product)"
						role="button"
						class="fa-solid fa-circle-plus text-success"
					></i>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "ProductCard",
	props: ["product"],
	data() {
		return {
			cart: [],
		};
	},
	methods: {
		addProductToCart(product) {
			this.cart.push(product);
			console.log(this.cart);
			return this.$emit("addProduct", product);
		},
		removeProductFromCart(product) {
			const position = this.cart.indexOf(product);
			if (position > -1) {
				this.cart.splice(position, 1);
			}
			console.log(this.cart);
			return this.$emit("removeProduct", product);
		},
	},
};
</script>

<style scoped lang="scss">
</style>