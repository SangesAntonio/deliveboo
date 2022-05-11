<template>
	<div>
		<Loader v-if="isLoading && !users.length" />
		<div class="container mb-5">
			<div class="row">
				<div class="col-12">
					<h1>Lista dei ristoranti</h1>
					<!-- check box -->
					<section id="checkbox">
						<ul class="category-list d-flex flex-wrap">
							<li
								v-for="category in categories"
								:key="category.id"
								:class="category.name"
								class="
									col-2
									d-flex
									flex-column
									justify-content-center
									align-items-center
								"
							>
								<div class="switch1">
									
										<input
											v-model="selectedCategory"
											:id="`switch-${category.id}`"
											type="checkbox"
											hidden
											:value="category"
											@click="getRestaurants()"
										/>
										<label :for="`switch-${category.id}`">{{ category.name }}</label
									>
								</div>
							</li>
						</ul>
					</section>
					<div class="col-12 d-flex flex-wrap">
						<Card
							v-for="user in filteredArray"
							:key="user.id"
							:user="user"
							:selectedCategories="selectedCategory"
							class="my-3"
						/>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from "axios";
import Card from "../restaurants/Card.vue";
import Loader from "../Loader.vue";
export default {
	name: "RestaurantList",
	components: {
		Card,
		Loader,
		// Pagination,
	},
	data() {
		return {
			selectedCategory: [],
			isLoading: false,
			users: [],
			filteredUsers: [],

			categories: [],
			filteredArray: [],
		};
	},
	methods: {
		getSingleProduct() {
			this.filteredArray = new Set(this.users.filter((numb) => numb === numb));
		},
		getRestaurants() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/users")
				.then((res) => {
					if (!this.selectedCategory.length) {
						this.filteredArray = res.data;
					} else {
						this.filteredArray = [];
						res.data.forEach((restaurant) => {
							restaurant["categories"].forEach((type) => {
								console.log(type["name"], ":categorie dei risoranti");

								this.selectedCategory.filter((user) => {
									if (type["name"] === user["name"]) {
										if (!this.filteredArray.includes(restaurant)) {
											this.filteredArray.push(restaurant);
										}
									}
								});
							});
						});
					}
				})
				.catch((err) => {
					console.error(err);
				})
				.then(() => {
					this.isLoading = false;
				});
		},

		getCategory() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/categories/")
				.then((res) => {
					this.categories = res.data;
				})
				.catch((err) => {
					consol.log(err);
				})
				.then(() => {
					this.isLoading = false;
				});
		},
		selectedItems(users) {
			this.filteredArray = users.filter((user) =>
				this.selectedCategory.includes(user.category)
			);
		},
	},
	computed: {},
	mounted() {
		this.getRestaurants();
		this.getCategory();

	},
};
</script>

<style lang="scss" scoped>
h1 {
	font-family: "Koulen", corsive;
	background-color: #ffc562;
	box-shadow: 5px 5px 5px 5px rgb(0, 0, 0, 0.5);
	border-radius: 20px;
	text-align: center;
	padding: 10px;
}

ul {
	margin: 30px 0px;
	li {
		list-style-type: none;
		margin: 20px 0px;
		.switch1 {
			display: inline;
			margin: 0 10px;
		}
	}
}
</style>