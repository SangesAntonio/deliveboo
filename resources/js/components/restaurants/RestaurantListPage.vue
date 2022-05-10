<template>
  <div>
    <Loader v-if="isLoading && !users.length" />
    <div class="container mb-5">
      <div class="row">
        <div class="col-12">
          <h1>Lista dei ristoranti</h1>
          <!-- check box -->
          <section id="checkbox">
            <ul class="category-list d-flex">
              <li
                v-for="category in categories"
                :key="category.id"
                :class="category.name"
              >
                <div class="switch1">
                  <input
                    v-model="selectedCategory"
                    id="switch1"
                    type="checkbox"
                    :value="category"
                    @click="getRestaurants()"
                  />
                  <label for="switch1">{{ category.name }}</label>
                </div>
              </li>
            </ul>
          </section>
          <div class="col-12 d-flex flex-wrap">
            <Card
              v-for="user in filteredArray"
              :key="user.id"
              :user="user"
              :selectedCategories="selectedCategory"
              class="my-3"
            />
          </div>
          <!-- <div class="col-12 d-flex justify-content-center">
            <Pagination
              :pagination="pagination"
              @on-page-change="getRestaurantPages"
            />
          </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Card from "../restaurants/Card.vue";
import Loader from "../Loader.vue";
// import Pagination from "../Pagination.vue";
export default {
  name: "RestaurantList",
  components: {
    Card,
    Loader,
    // Pagination,
  },
  data() {
    return {
      selectedCategory: [],
      isLoading: false,
      // pagination: [],
      users: [],
      filteredUsers: [],

      categories: [],
      filteredArray: [],
    };
  },
  methods: {
    // getUnique(users) {
    //   let result = users.reduce((this.filteredUsers, o) => {
    //     if (!this.filteredUsers.some((obj) => obj.id === o.id)) {
    //       this.filteredUsers.push(o);
    //     }
    //   });
    // },

    getSingleProduct() {
      this.filteredArray = new Set(this.users.filter((numb) => numb === numb));
    },
    getRestaurants() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/users")
        .then((res) => {
          if (!this.selectedCategory.length) {
            this.filteredArray = res.data;
          } else {
            this.filteredArray = [];
            res.data.forEach((restaurant) => {
              restaurant["categories"].forEach((type) => {
                console.log(type["name"], ":categorie dei risoranti");

                this.selectedCategory.filter((user) => {
                  if (type["name"] === user["name"]) {
                    if (!this.filteredArray.includes(restaurant)) {
                      this.filteredArray.push(restaurant);
                    }
                  }
                });
              });
              // console.log(user["name"], ":categorie dei check");
            });
          }
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },

    getCategory() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/categories/")
        .then((res) => {
          this.categories = res.data;
        })
        .catch((err) => {
          consol.log(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },

    // getRestaurantPages(page = 1) {
    //   this.isLoading = true;
    //   axios
    //     .get("http://localhost:8000/api/users?page=" + page)
    //     .then((res) => {
    //       const { data, current_page, last_page } = res.data;

    //       this.usersPage = data;
    //       this.pagination = {
    //         lastPage: last_page,
    //         currentPage: current_page,
    //       };
    //     })
    //     .catch((err) => {
    //       console.error(err);
    //       this.isError = true;
    //     })
    //     .then(() => {
    //       console.log("Chiamata terminata");
    //       this.isLoading = false;
    //     });
    // },
    selectedItems(users) {
      this.filteredArray = users.filter((user) =>
        this.selectedCategory.includes(user.category)
      );
    },
  },
  computed: {},
  mounted() {
    this.getRestaurants();
    this.getCategory();
    // this.getRestaurantPages();
    // this.selectedItems();
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

ul {
  margin: 30px 0px;
  li {
    list-style-type: none;
    margin: 20px 0px;
    .switch1 {
      display: inline;
      margin: 0 10px;
    }
  }
}
</style>