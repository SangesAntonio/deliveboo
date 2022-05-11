<template>
  <div>
    <Loader v-if="isLoading && !users.length" />
    <div class="container mb-5">
      <div class="row">
        <div class="col-12">
          <h1 class="title">Lista dei ristoranti</h1>
          <!-- check box -->
          <section id="checkbox">
            <ul class="category-list d-flex flex-wrap justify-content-center">
              <li
                v-for="(category, i) in categories"
                :key="i"
                class="
                  col-3 col-md-2
                  d-flex
                  flex-column
                  justify-content-center
                  align-items-center
                "
              >
                <div :class="`switch-${category.id}`">
                  <input
                    v-model="selectedCategory"
                    :id="`switch-${category.id}`"
                    type="checkbox"
                    hidden
                    :value="category"
                    @click="getRestaurants()"
                  />
                  <label
                    :class="category.name"
                    :for="`switch-${category.id}`"
                    class="
                      active-cs
                      px-3
                      pt-2
                      d-flex
                      flex-column
                      justify-content-center
                      align-items-center
                    "
                  >
                    <span class="d-block pb-2">{{ category.name }}</span>
                  </label>
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
    // Pagination,
  },
  data() {
    return {
      activeItem: null,
      selectedCategory: [],
      isLoading: false,
      users: [],
      filteredUsers: [],

      categories: [],
      filteredArray: [],
    };
  },
  methods: {
    selectItem(i) {
      this.activeItem = i;
    },
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