<template>
  <div>
    <div id="homepage">
      <Loader v-if="isLoading && !categories.length" />
      <SliderPromotions v-if="!isLoading" class="pb-4" />
      <div class="container">
        <div class="row">
          <div
            class="
              col-12
              d-flex
              flex-wrap
              justify-content-center
              align-items-center
              mb-lg-5
            "
            id="categorie-ristoranti"
          >
            <div
              id="title-box"
              class="col-12 d-flex justify-content-center py-1 mb-2"
            >
              <h2 id="category-title" class="text-center fw-bold m-0">
                LE NOSTRE CATEGORIE
              </h2>
            </div>
            <div
              v-for="(category, index) in categories"
              :key="index"
              class="card px-sm-0 col-12 col-sm-5 col-md-3 col-xl-2 grow"
              role="button"
            >
              <router-link
                :to="{
                  name: 'filtered-restaurants',
                  params: { id: category.id },
                }"
                class="text-decoration-none text-dark"
              >
                <div class="restaurant-title">{{ category.name }}</div>
                <hr class="m-0" />
                <div>
                  <img
                    class="img-fluid p-3 p-sm-2 restaurant-image"
                    :src="`storage/${category.image}`"
                    alt="Immagine Ristorante"
                  />
                </div>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Jumbotron v-if="!isLoading" class="d-none d-lg-block" />
  </div>
</template>

<script>
import SliderPromotions from "./SliderPromotions.vue";
import Jumbotron from "../Jumbotron.vue";
import Loader from "../Loader.vue";
import axios from "axios";
export default {
  name: "HomePage",
  components: {
    SliderPromotions,
    Jumbotron,
    Loader,
  },
  data() {
    return {
      isLoading: false,
      categories: [],
    };
  },
  methods: {
    getCategories() {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/categories")
        .then((res) => {
          this.categories = res.data;
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  mounted() {
    this.getCategories();
  },
};
</script>
<style lang="scss" scoped>
#title-box {
  border-radius: 15px;
  background-color: #ffa500;
  box-shadow: 6px 5px 1px #ff7f00;
}

#category-title {
  font-family: "Koulen", cursive;
  font-weight: bold;
}

@media (min-width: 0px) {
  .restaurant-image {
    width: 475px;
    height: 400px;
    border-radius: 15px;
    margin-top: 6px;
  }
  .restaurant-title {
    font-size: 30px;
  }
}

@media (min-width: 576px) {
  .card {
    width: 200px;
  }
  .restaurant-image {
    width: 170px;
    height: 170px;
  }
  .restaurant-title {
    font-size: 22px;
  }
}

.slider-promozioni {
  background-color: lightblue;
  background-image: url(/img/pubb/promotions-bg.jpg);
  background-size: cover;
  position: relative;
}
#categorie-ristoranti {
  font-size: 20px;
  .card {
    margin: 20px;
    padding: 10px;
    background-color: orange;
    text-align: center;
    border-radius: 10px;
    font-family: "Koulen", cursive;
    box-shadow: 6px 5px 1px #ff7f00;
    font-weight: 600;
  }
}
</style>