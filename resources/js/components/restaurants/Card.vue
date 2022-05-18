<template>
<div class="col-12 col-md-6 col-xl-4">
  <div class="restaurant-details">
    <div class="cropper">
      <img class="" :src="`/storage/${user.image}`" alt="Card image cap">  <!--//inserire src qui! -->
    </div>
  <div class="">
    <p class="">
      <ul class="restaurant-informations mt-3">
        <li class="text-black text-center"><div class="h4 text-uppercase w-100"> {{user.restaurant_name}}</div></li>
        <li class="text-black"><span class="information-name">Indirizzo:</span> {{user.address}}</li>
        <li><span class="information-name">Categorie:</span></li>
        <div v-if="user.categories">
          <ul class="food-categories" v-for="category in user.categories" :key="category.id">
          <li :class="category.name" id="icon">
            {{category.name}}
          </li>
          </ul>
        </div>
        <div v-else>
          <ul class="food-categories mt-3">
          <li :class="category.name">
            {{category.name}}
          </li>
          </ul>
        </div>
        </ul>
    </p>
  </div>
    <router-link class="d-flex justify-content-end text-decoration-none" 
      :to="{ name: 'restaurant-detail', params: { id: user.id } }">
      <span class="text nav-text t-deliveboo-green ml-1 information-link">Scopri il ristorante</span>
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
	font-family: "Josefin Sans", sans-serif;
	height: 650px;
	border-bottom: 2px solid #00ccbc;
	border-radius: 0px 40px 12px 40px;
	.cropper {
		width: 100%;
		height: 200px;
		overflow: hidden;
		border: 2px;
		border-radius: 0px 40px 12px 40px;
		img {
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
	background-color: #00ccbb;
	color: white;
	font-size: 15px;
	padding: 7px 10px;
	border-radius: 10px;
	box-shadow: 6px 5px 1px rgba(1, 107, 98, 0.5);
}
</style>