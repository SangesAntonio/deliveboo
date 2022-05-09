<template>
  <div>
    <Loader v-if="isLoading && !users.length" />
    <div class="container mb-5">
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
          <div class="col-12 d-flex justify-content-center">
            <Pagination
              :pagination="pagination"
              @on-page-change="getRestaurantPages"
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
import Pagination from "../Pagination.vue";
export default {
  name: "RestaurantList",
  components: {
    Card,
    Loader,
    Pagination,
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

    getRestaurantPages(page = 1) {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/users?page=" + page)
        .then((res) => {
          const { data, current_page, last_page } = res.data;

          this.users = data;
          this.pagination = {
            lastPage: last_page,
            currentPage: current_page,
          };
        })
        .catch((err) => {
          console.error(err);
          this.isError = true;
        })
        .then(() => {
          console.log("Chiamata terminata");
          this.isLoading = false;
        });
    },
  },
  mounted() {
    this.getRestaurants();
    this.getRestaurantPages();

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