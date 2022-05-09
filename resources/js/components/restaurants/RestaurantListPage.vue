<template>
  <div class="mt-lg-5 pt-lg-5 pt-5">
    <Loader v-if="isLoading && !users.length" />
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Lista dei ristoranti</h1>
          <div class="col-12 d-flex flex-wrap">
            <Card
              v-for="user in users"
              :key="user.id"
              :user="user"
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
  },
  data() {
    return {
      isLoading: false,
      users: [],
    };
  },
  methods: {
    getRestaurants() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/users")
        .then((res) => {
          this.users = res.data;
          console.log(res.data);
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
    this.getRestaurants();
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
</style>