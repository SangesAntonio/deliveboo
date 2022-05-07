<template>
  <div class="mt-lg-5 pt-lg-5 pt-5">
    <Loader v-if="isLoading && !category.length" />
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>{{ category.name }}</h1>
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
          this.error = true;
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
h1 {
  font-family: "Koulen", corsive;
  background-color: #ffc562;
  box-shadow: 5px 5px 5px 5px rgb(0, 0, 0, 0.5);
  border-radius: 20px;
  text-align: center;
  padding: 10px;
}
.container {
  background-color: #d78129;
  border-radius: 30px;
  box-shadow: 10px 10px 10px 10px rgb(0, 0, 0, 0.5);
  padding: 30px;
}
</style>