<template>
	<div class="col-12 col-md-6 col-xl-4 py-3">
		<div class="card">
			<div class="product-image d-flex justify-content-center p-2">
				<img
				    :src="`/storage/${product.image}`"
				    class="card-img-top img-fluid"
				    :alt="product.name"
			    />
			</div>
			<div class="card-body">
				<h5 class="card-title">{{ product.name }}</h5>
				<p class="card-text">
					{{ product.description }}
				</p>
				<p class="card-text product-price text-mute">{{ product.price }}€</p>
			</div>
			<div class="cart-section d-flex justify-content-end mt-1 mb-3 mr-3 py-1">
				<div
				class="d-flex justify-content-center align-items-center quantity-section"
			>
				<div class="d-flex justify-content-between align-items-center">
					<!-- tasto minore -->
					<i
						@click="removeProductFromCart(product)"
						role="button"
						class="fa-solid fa-circle-minus qnt-btn"
					></i>

					<!-- bottone carrello -->
					<button class="btn m-0">
						<i v-if="!product.quantity" class="fa-solid fa-cart-arrow-down">
						</i>
						<i v-else style="font-family: 'Koulen'; color:white;">{{ product.quantity }}</i>
					</button>

					<!-- tasto più -->
					<i
						@click="addProductToCart(product)"
						role="button"
						class="fa-solid fa-circle-plus qnt-btn"
					></i>
				</div>
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
			this.product.quantity++;
			if (this.cart.includes(product)) {
			}
			this.cart.push(product);
			console.log(this.cart);
			return this.$emit("addProduct", product);
		},
		removeProductFromCart(product) {
			if (this.product.quantity > 0) {
				this.product.quantity--;
			}
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
img {
	object-fit: cover;
	object-position: center;
	width: 100%;
	height: 150px;
	border-radius: 5px;
	box-shadow: rgb(0, 0, 0, 0.4) 4px 4px;
}
.card{
	background-color: #FFA500;
	box-shadow: #FF7F00 8px 8px;
	.product-price{
		font-family: "Koulen", cursive;
		font-size: 18px;
	}
	.quantity-section{
		background-color: #00CCBC;
		width: 40%;
		height: 100%;
		border-radius: 50px;
		box-shadow: #028378 4px 4px;
		.fa-cart-arrow-down{
			color: white;
		}
		.qnt-btn{
			color: white;
		}
		i{
			font-size: 20px;
			vertical-align: middle;
		}
	}
}
</style>