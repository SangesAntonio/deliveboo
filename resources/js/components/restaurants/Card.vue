<template>
<div class="col-4">
  <div class="card restaurant-details">
    <div class="cropper">
      <img class="card-img-top" :src="`/storage/${user.image}`" alt="Card image cap">  <!--//inserire src qui! -->
    </div>
  <div class="card-body">
    <p class="card-text">
      <ul class="restaurant-informations">
        <li class="text-black"><span class="information-name">Indirizzo:</span> {{user.address}}</li>
        <li class="text-black"><span class="information-name">Nome:</span> {{user.restaurant_name}}</li>
        <li><span class="information-name">Categorie:</span></li>
        <ul class="food-categories" v-for="category in user.categories" :key="category.id">
          <li>
            {{category.name}}
          </li>
        </ul>
      </ul>
    </p>
  </div>
  <router-link class="d-flex justify-content-end" :to="{ name: 'restaurant-detail', params: { id: user.id } }">
                  
                  <span class="text nav-text t-deliveboo-green ml-1 information-link">Scopri il ristorante</span>
                </router-link>
  </div>
</div>
</template>

<script>
export default {
  name: "Card",
  props: ["user"],
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
.restaurant-details{
  background-color:  #FFE4BD;
  border-radius: 10px;
  padding: 15px;
  font-family: 'Josefin Sans', sans-serif;
  height: 650px;
  box-shadow: 4px 4px 3px 3px rgb(0, 0, 0, 0.5);
  .cropper{
    width: 100%;
    height: 200px;
    overflow: hidden;
    border: 5px solid #b88e47;
    img{
      height: 200px;
      overflow: hidden;
    }
  }
  ul{
    list-style-type: none;
    .food-categories{
      list-style-type: circle;
      margin-left: 30px;
    }
  }
  .information-name{
    font-weight: 700;
  }
  .restaurant-informations{
    li{
      padding: 5px 10px;
    }
  }
}
.information-link{
  background-color: #00CCBB;
  color: white;
  font-size: 15px;
  padding: 7px 10px;
  border-radius: 10px;
  box-shadow: 2px 2px 2px 2px rgba(1, 107, 98, 0.5);
  :hover{
    text-decoration: none;
    color: black;
    border: 2px solid;
  }
}

</style>