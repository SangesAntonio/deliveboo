<template>

  <div class="container">
    <div class="row pt-5">
      <div class="col-12 pt-md-5">
        <h3 class="pb-3 mx-3 title my-3 h1">{{ user.restaurant_name }}</h3>
        <b-card
          :img-src="`/storage/${user.image}`"
          img-alt="Card image"
          img-left
          class="mb-3 mx-3 card-res"
        >
          <b-card-text >
                <ul>
                <li class="text-black h3">{{ user.address }}</li>
                <ul class="category-list" v-for="category in user.categories" :key="category.id">
                  <li :class=" category.name ">
                    {{ category.name }}
                  </li>
                </ul>
                </ul>
          </b-card-text>
        </b-card>

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
          <ProductCard
            @addProduct="addProduct"
            @removeProduct="removeProduct"
            v-for="(product, index) in user.products"
            :key="index"
            :product="product"
          />
        </div>
      </div>
      <ModalCart
        :cart="cart"
        class="fixed-top pt-md-5 mt-5 mr-3 cart ml-auto"
      />
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
      //correctCart: [],
      user: [],
      cart: [],
    };
  },
  computed: {
    // setLupo() {
    //   setInterval(() => {
    //     this.getSingleProduct;
    //   }, 1000);
    // },
    // getSingleProduct() {
    //   this.correctCart = new Set(this.cart.filter((numb) => numb === numb));
    //   console.log(this.correctCart);
    //   return this.correctCart;
    // },
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
  background-color: #ffa500;
    box-shadow: 6px 5px 1px #ff7f00;
  border-radius: 20px;
  text-align: center;
  padding: 10px;
}
.card-res{
  padding: 10px;
   background-color: #ffa500;
   box-shadow: 6px 5px 1px #ff7f00;
}
img {
  max-width: 30%;
}
.cart {
  width: 60px;
}
.category-list{
  display: inline-block;
  margin-right: 10px;
}
ul{
  li{
    list-style-type: none;
    margin-bottom: 10px;
    text-transform: uppercase;
  }
}
img{
  border-radius: 25px;
}
</style>