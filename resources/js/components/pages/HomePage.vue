<template>
	<div id="homepage">
		<SliderPromotions class="pb-4" />
		<!-- <p class="not-to-lose d-none d-lg-block">Da non perdere</p> -->
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

				    <div v-for="(category, index) in categories" :key="index" class="col-12 col-sm-5 col-md-3 col-xl-2">{{category.name}}</div>
				
				</div>
			</div>
		</div>
		<Jumbotron class="d-none d-lg-block" />
	</div>
</template>

<script>
import SliderPromotions from "./SliderPromotions.vue";
import Jumbotron from "../Jumbotron.vue";
import axios from "axios";
export default {
	name: "HomePage",
	components: {
		SliderPromotions,
		Jumbotron,
	},
	data(){
		return {
			isLoading: false,
			categories: [],
		}
	},
	methods: {
		getCategories(){
			axios
			.get('http://localhost:8000/api/categories')
			.then((res) => {
				this.categories = res.data;
				console.log(res.data);
			})
			.catch((err) => {
				console.log(err);
			})
		}
	},
	mounted(){
		this.getCategories();
	},
};
</script>
<style lang="scss" scoped>
.slider-promozioni {
	background-color: lightblue;
	background-image: url(/img/pubb/promotions-bg.jpg);
	background-size: cover;
	position: relative;

	.not-to-lose {
		background-color: #ffc562;
		font-family: "Koulen", cursive;
		font-size: 30px;
		padding: 5px 15px;
		border-radius: 30px;
		transform: rotate(-25deg);
		border: solid 2px #ffa500;
		text-shadow: 2px 2px 4px #888888;
		box-shadow: 2px 2px 4px #1f1f1f;
		position: absolute;
		top: 10%;
		left: 15%;
	}
}
#categorie-ristoranti {
	font-size: 20px;
	& > * {
		margin: 20px;
		padding: 10px;
		background-color: orange;
		text-align: center;
		border-radius: 10px;
		font-family: "Koulen", cursive;
		font-weight: 600;
		box-shadow: 2px 2px 4px #1f1f1f;
	}
}
</style>