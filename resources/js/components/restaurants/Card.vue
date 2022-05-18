<template>
	<div class="col-12 col-md-6 col-xl-4">
		<div class="restaurant-details 'position-relative">
			<div class="cropper">
				<img :src="`/storage/${user.image}`" :alt="user.restaurant_name" />
			</div>
			<div>
				<ul class="restaurant-informations mt-3">
					<li class="text-black text-center">
						<div class="h4 text-uppercase w-100">
							{{ user.restaurant_name }}
						</div>
					</li>
					<li class="text-black">
						<span class="information-name">Indirizzo:</span> {{ user.address }}
					</li>
					<li><span class="information-name">Categorie:</span></li>
					<div v-if="user.categories">
						<div
							class="food-categories"
							v-for="category in user.categories"
							:key="category.id"
						>
							<span :class="category.name" id="icon" class="pl-2">
								{{ category.name }}
							</span>
						</div>
					</div>
					<div v-else>
						<ul class="food-categories mt-3">
							<li :class="category.name">
								{{ category.name }}
							</li>
						</ul>
					</div>
				</ul>
			</div>
			<router-link
				class="d-flex justify-content-end text-decoration-none"
				:to="{ name: 'restaurant-detail', params: { id: user.id } }"
			>
				<span class="text nav-text t-deliveboo-green ml-1 information-link"
					>Scopri il ristorante</span
				>
			</router-link>
		</div>
	</div>
</template>

<script>
export default {
	name: "Card",
	props: ["user", "category"],
	data() {
		return {};
	},
	methods: {},
};
</script>

<style lang="scss" scoped>
ul {
	margin: 0;
	li {
		list-style-type: none;
	}
}
.restaurant-details {
	padding: 15px;
	height: 450px;
	box-shadow: 5px 5px 10px -3px rgba(0, 0, 0, 0.5);
	border-radius: 0px 40px 12px 40px;
	.cropper {
		width: 100%;
		height: 200px;
		overflow: hidden;
		border: 2px;
		border-radius: 0px 40px 12px 40px;

		img {
			width: 100%;
			height: 200px;
			object-fit: cover;
		}
	}
	.information-name {
		font-weight: 700;
	}
	.restaurant-informations {
		li {
			padding: 5px 10px;
		}
	}
}
.information-link {
	position: absolute;
	bottom: 20px;
	right: 0;
	background-color: #00ccbb;
	color: white;
	font-size: 15px;
	padding: 7px 10px;
	border-radius: 10px;
	box-shadow: 0px 0px 8px 3px #008378;
}
</style>