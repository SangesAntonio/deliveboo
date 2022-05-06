<template>
  <div class="container">
    <div class="row pt-5">
      <div class="col-12 pt-md-5">
        <h3 class="pb-3 mx-3">{{ user.restaurant_name }}</h3>
        <b-card
          :img-src="`/storage/${user.image}`"
          img-alt="Card image"
          img-left
          class="mb-3 mx-3"
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
    </div>

    <div class="row">
      <div
        class="
          col-12
          d-flex
          flex-wrap
          align-items-center
          justify-content-between
        "
      >
        <ModalCart :cart="cart" class="fixed-top m-3" />
        <ProductCard
          @addProduct="addProduct"
          @removeProduct="removeProduct"
          v-for="(product, index) in user.products"
          :key="index"
          :product="product"
        />
      </div>
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
      isLoading: false,
      user: [],
      cart: [],
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
img {
  width: 30%;
}
</style>