<template>
  <div>
    <Loader v-if="isLoading && !users.length" />
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Lista dei ristoranti</h1>
          <!-- check box -->
          <section id="checkbox">
            <ul class="category-list" >
                  <li v-for="category in categories" :key="category.id" :class=" category.name ">
                        <div class="switch1">
                          <input v-model="selectedCategory" id="switch1" type="checkbox" :value="category.name">
                          <label for="switch1">{{ category.name }}</label>
                        </div>
                  </li>
            </ul>
          </section>
          <div class="col-12 d-flex flex-wrap">
            <Card 
              v-for="user in selectedItems"
              :key="user.id"
              :user="user"
              class="my-3"
              :selectedCategory = "selectedCategory"
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
      selectedCategory:[],
      isLoading: false,
      users: [],
      categories: [],
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
    getCategories() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/categories")
        .then((res) => {
          this.categories = res.data;
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

  computed :{
        selectedItems() {
          return this.users.filter(function (user) {
            return this.selectedCategory.includes(user.category);
        }, this);
      },
  },
  mounted() {
    this.getRestaurants();
    this. getCategories();
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

ul{
  margin: 30px 0px;
  li{
    list-style-type: none;
     margin: 20px 0px;
     .switch1{
       display: inline;
    margin: 0 10px;
     }
  }
}
</style>