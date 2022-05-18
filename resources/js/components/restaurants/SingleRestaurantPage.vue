<template>
	<div class="container pb-5">
		<div class="row pt-5">
			<div class="col-12 pt-md-5">
				<b-card
					:img-src="`/storage/${user.image}`"
					img-alt="Card image"
					img-left
					class="mb-3 mx-3 card-res border-0"
					style="background-color: transparent"
				>
					<b-card-text>
						<ul>
							<li>
								<h3 class="mb-3">
									{{ user.restaurant_name }}
								</h3>
							</li>
							<li class="text-black">{{ user.address }}</li>
							<ul
								class="category-list"
								v-for="category in user.categories"
								:key="category.id"
							>
								<li :class="category.name">
									{{ category.name }}
								</li>
							</ul>
						</ul>
					</b-card-text>
				</b-card>
			</div>

			<div class="col-12">
				<div
					class="
						col-12
						d-flex
						flex-wrap
						align-items-center
						justify-content-between
						flex-row
					"
				>
					<ProductCard
						@addProduct="addProduct"
						@removeProduct="removeProduct"
						v-for="(product, index) in user.products"
						:key="index"
						:product="product"
					/>
				</div>
			</div>
			<ModalCart :cart="cart" class="mr-3 mt-5 cart ml-auto" />
		</div>
	</div>
</template>

<script>
import axios from "axios";
import ProductCard from "../products/ProductCard.vue";
import ModalCart from "../ModalCart.vue";
export default {
	name: "RestaurantList",
	components: {
		ProductCard,
		ModalCart,
	},
	data() {
		return {
			user: [],
			cart: [],
		};
	},
	computed: {
		calcTotalPrice() {
			this.total = this.cart.reduce(
				(total, lineItem) => total + Number(lineItem.price),
				0
			);
			return this.total;
		},
	},
	methods: {
		getRestaurant() {
			//   this.isLoading = true;
			axios
				.get("http://localhost:8000/api/users/" + this.$route.params.id)
				.then((res) => {
					this.user = res.data;
					console.log(res.data);
				})
				.catch((err) => {
					console.error(err);
				})
				.then(() => {
					// this.isLoading = false;
				});
		},
		addProduct(product) {
			this.cart.push(product);
		},
		removeProduct(product) {
			const position = this.cart.indexOf(product);
			if (position > -1) {
				this.cart.splice(position, 1);
			}
		},
	},
	mounted() {
		this.getRestaurant();
	},
};
</script>

<style lang="scss" scoped>
.title {
	font-family: "Koulen", corsive;
	border-bottom: 2px solid #00ccbc;
	border-radius: 20px;
	text-align: center;
	padding: 10px;
}
.card-res {
	padding: 10px;
}
img {
	max-width: 50%;
	height: 300px;
	object-fit: cover;
	object-position: center;
	border-radius: 5px;
	box-shadow: 5px 5px 10px -3px rgba(0, 0, 0, 0.5);
}
.cart {
	width: 60px;
}
.category-list {
	display: inline-block;
	margin-right: 10px;
}
ul {
	li {
		list-style-type: none;
		margin-bottom: 10px;
		text-transform: uppercase;
	}
}
</style>