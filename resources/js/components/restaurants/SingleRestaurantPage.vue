<template>
  <div>
    <Card :user="user" />
  </div>
</template>


<script>
import axios from "axios";
import Card from "../restaurants/Card.vue";
export default {
  name: "RestaurantList",
  components: {
    Card,
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
  },
  mounted() {
    this.getRestaurant();
  },
};
</script>


<style lang="scss" scoped>
</style>