<template>
	<div>
		<div id="homepage">
			<Loader v-if="isLoading && !categories.length" />
			<div
				id="title-box"
				class="col-12 d-flex justify-content-center py-1 mb-2"
			>
				<h2 id="category-title" class="text-center fw-bold m-0 py-2">
					SCOPRI LE NOSTRE CATEGORIE
				</h2>
			</div>
			<div class="container">
				<div class="row">
					<div
						class="
							col-12
							d-flex
							flex-wrap
							justify-content-center
							align-items-center
							mb-lg-5
						"
						id="categorie-ristoranti"
					>
						<div
							v-for="(category, index) in categories"
							:key="index"
							class="px-sm-0 col-12 col-lg-6 grow img-blur"
							role="button"
						>
							<router-link
								:to="{
									name: 'filtered-restaurants',
									params: { id: category.id },
								}"
								class="text-decoration-none position-relative"
							>
								<div class="restaurant-title">{{ category.name }}</div>
								<div>
									<img
										class="img-fluid p-3 p-sm-2 restaurant-image"
										:src="`storage/${category.image}`"
										alt="Immagine Ristorante"
									/>
								</div>
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
		<Jumbotron class="p-0 m-0" v-if="!isLoading" />
	</div>
</template>

<script>
import Jumbotron from "../Jumbotron.vue";
import Loader from "../Loader.vue";
import axios from "axios";
export default {
	name: "HomePage",
	components: {
		Jumbotron,
		Loader,
	},
	data() {
		return {
			isLoading: false,
			categories: [],
		};
	},
	methods: {
		getCategories() {
			this.isLoading = true;
			axios
				.get("http://localhost:8000/api/categories")
				.then((res) => {
					this.categories = res.data;
					console.log(res.data);
				})
				.catch((err) => {
					console.log(err);
				})
				.then(() => {
					this.isLoading = false;
				});
		},
	},
	mounted() {
		this.getCategories();
	},
};
</script>
<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');
#category-title {
	border-bottom: 2px solid #00ccbc;
}
.restaurant-image {
		filter:drop-shadow(0px 0px 2px #000) brightness(0.9) ;
		&:hover{
			filter:drop-shadow(0px 0px 2px #000) brightness(0.9) blur(2px);
		}
}
	.restaurant-title{
		 -webkit-text-stroke: 2px rgba(0, 0, 0, 0.5);
		 font-family: 'Staatliches', cursive;
	}
@media (min-width: 0px) {
	.restaurant-image {
		width: 100%;
		height: 200px;
		border-radius: 15px;
		margin-top: 6px;
		object-fit: cover;
		object-position: center;

	}
	.restaurant-title {
		color: #fff;
		font-size: 64px;
		position: absolute;
		bottom: 50%;
		right: 50%;
		transform: translate(50%, 50%);
		z-index:1;
	}
}

@media (min-width: 576px) {
	.card {
		width: 200px;
	}
	.restaurant-image {
		width: 100%;
		height: 200px;
	}
}
#categorie-ristoranti {
	font-size: 20px;
}
</style>