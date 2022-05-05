<template>
  <div>
    <div class="mt-4">
      <h4>{{ user.restaurant_name }}</h4>
      <b-card
        :img-src="`/storage/${user.image}`"
        img-alt="Card image"
        img-left
        class="mb-3"
      >
        <b-card-text>
          <ul>
            <li class="text-black">{{ user.address }}</li>
            <li class="text-black">{{ user.restaurant_name }}</li>
            <ul v-for="category in user.categories" :key="category.id">
              <li>
                {{ category.name }}
              </li>
            </ul>
          </ul>
        </b-card-text>
      </b-card>
    </div>
    <div class="row">
      <ProductCard
        @addProduct="addProduct"
        @removeProduct="removeProduct"
        v-for="(product, index) in user.products"
        :key="index"
        :product="product"
      />
    </div>
  </div>
</template>


<script>
import axios from "axios";
import ProductCard from "../products/ProductCard.vue";
export default {
  name: "RestaurantList",
  components: {
    ProductCard,
  },
  data() {
    return {
      isLoading: false,

      user: [],
    };
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
      return this.$emit("addProduct", product);
    },

    removeProduct(product) {
      return this.$emit("removeProduct", product);
    },
  },
  mounted() {
    this.getRestaurant();
  },
};
</script>


<style lang="scss" scoped>
img {
  width: 30%;
}
</style>