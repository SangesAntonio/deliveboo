<template>
	<div>
		<Loader v-if="isLoading && !users.length" />
		<div class="col-12 d-flex justify-content-center py-1 mb-2">
			<h2 class="title text-uppercase fw-bold m-0 py-2">
				{{ category.name }}
			</h2>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 d-flex flex-wrap">
					<Card
						v-for="user in category.users"
						:key="user.id"
						:user="user"
						:category="category"
						class="my-3"
					/>
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
	name: "FilteredRestaurants",
	components: {
		Card,
		Loader,
	},
	data() {
		return { category: [], isLoading: false };
	},
	methods: {
		filterCategory() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/categories/" + this.$route.params.id)
				.then((res) => {
					this.category = res.data;
				})
				.catch((err) => {
					console.error(err);
				})
				.then(() => {
					this.isLoading = false;
				});
		},
	},
	mounted() {
		this.filterCategory();
	},
};
</script>

<style lang="scss" scoped>
.title {
	border-bottom: 2px solid #00ccbc;
}
.container {
	padding-top: 30px;
	padding-bottom: 30px;
}
</style>