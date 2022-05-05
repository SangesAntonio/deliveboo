<template>
  <div>
    <b-button
      v-b-toggle.sidebar-1
      style="background-color: #00ccbc; border: 2px solid #00998c"
      class="bg-deliveboo-green m-3 rounded"
      ><i class="fas fa-bars"></i
    ></b-button>
    <b-sidebar id="sidebar-1" class="logo h2 m-0 font-weight-bold menu" shadow>
      <h1 class="ml-4 pl-3 t-deliveboo-green">DELIVEBOO</h1>
      <template #footer="{ hide }">
        <div
          class="
            d-flex
            bg-deliveboo-green
            text-light
            align-items-center
            px-3
            py-2
          "
        >
          <div class="mx-auto">
            <i class="fab fa-instagram ml-2 mr-3" role="button"></i>
            <i class="fab fa-twitter mx-3" role="button"></i>
            <i class="fab fa-facebook-f mx-3" role="button"></i>
            <i class="fab fa-linkedin mx-3" role="button"></i>
          </div>
        </div>
      </template>
      <div class="px-3 py-2 d-flex flex-column h-100">
        <div
          class="
            menu-items
            pt-4
            d-flex
            flex-column
            justify-content-between
            h-100
          "
        >
          <div>
            <ul>
              <li class="brd-deliveboo-green py-3 w-75">
                <router-link to="/home">
                  <i class="fas fa-home t-deliveboo-green"></i>
                  <span class="text nav-text t-deliveboo-green ml-1">Home</span>
                </router-link>
              </li>
              <li class="my-3 brd-deliveboo-green py-3 w-75">
                <router-link to="/restaurants">
                  <i class="fas fa-utensils t-deliveboo-green"></i>
                  <span class="text nav-text t-deliveboo-green ml-2"
                    >Ristoranti</span
                  >
                </router-link>
              </li>
              <li class="brd-deliveboo-green py-3 w-75">
                <router-link to="/order">
                  <i class="fas fa-shopping-bag t-deliveboo-green"></i>
                  <span class="text nav-text t-deliveboo-green ml-2"
                    >Ordine</span
                  >
                </router-link>
              </li>

              <!-- !!!!!!!!!!!!!!! da eliminare !!!!!!!!!!!!!!!!!!-->
              <li class="brd-deliveboo-green py-3 w-75">
                <router-link to="/payment">
                  <i class="fas fa-shopping-bag t-deliveboo-green"></i>
                  <span class="text nav-text t-deliveboo-green ml-2"
                    >demo</span
                  >
                </router-link>
              </li>
            </ul>
          </div>
          <div class="d-flex flex-column justify-content-end mb-5">
            <ul>
              <li>
                <a href="/admin">
                  <i class="fas fa-user t-deliveboo-green"></i>
                  <span class="text nav-text t-deliveboo-green ml-2"
                    >Login</span
                  ></a
                >
              </li>
              <li class="my-3">
                <a href="/register">
                  <i class="far fa-user t-deliveboo-green"></i>
                  <span class="text nav-text t-deliveboo-green m-2"
                    >Register</span
                  ></a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </b-sidebar>
  </div>
</template>

<script>
export default {
  name: "NavBar",
};
</script>

<style lang="scss" scoped>
@import "../../sass/navbar2.scss";

.b-sidebar #sidebar-1 .bg-light {
  background-color: #00ccbc !important;
}
</style>