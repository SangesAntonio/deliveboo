<template>
  <div id="sidebar">
    <b-button
      id="nav-button"
      v-b-toggle.sidebar-1
      style="background-color: #00ccbc; border: 2px solid #d78129"
      class="bg-light m-3 p-3 rounded-circle"
      ><img id="nav-logo" src="/img/pubb/hamb-menu.png" alt="Logo"
    /></b-button>
    <b-sidebar
      no-header
      id="sidebar-1"
      class="logo m-0 p-0 font-weight-bold menu"
      width="120px"
      :backdrop-variant="variant"
      shadow
      backdrop
    >
      <!-- <h1 class="ml-4 pl-3 t-deliveboo-green">DELIVEBOO</h1> -->
      <!-- <template #footer="{ hide }">
        <div
          class="d-flex bg-deliveboo-green text-light align-items-center py-2"
        >
          <div class="mx-auto">
            <i class="fab fa-instagram ml-2 mr-3" role="button"></i>
            <i class="fab fa-twitter mx-3" role="button"></i>
            <i class="fab fa-facebook-f mx-3" role="button"></i>
            <i class="fab fa-linkedin mx-3" role="button"></i>
          </div>
        </div>
      </template> -->
      <div class="d-flex flex-column h-100">
        <div class="d-flex flex-column justify-content-between h-100">
          <div class="d-flex flex-grow-1">
            <ul class="d-flex flex-column align-items-center flex-grow-1">
              <li class="my-5 py-2">
                <router-link to="/home" class="text-decoration-none">
                  <i class="fas fa-home t-deliveboo-green fa-3x"></i>
                  <!-- <span class="text nav-text t-deliveboo-green ml-1">Home</span> -->
                </router-link>
              </li>
              <li class="my-5 py-2">
                <router-link to="/restaurants" class="text-decoration-none">
                  <i class="fas fa-utensils t-deliveboo-green fa-3x"></i>
                  <!-- <span class="text nav-text t-deliveboo-green ml-2"
                    >Ristoranti</span
                  > -->
                </router-link>
              </li>
              <li class="mt-5 py-2">
                <router-link to="/order" class="text-decoration-none">
                  <i class="fas fa-shopping-bag t-deliveboo-green fa-3x"></i>
                  <!-- <span class="text nav-text t-deliveboo-green ml-2"
                    >Ordine</span
                  > -->
                </router-link>
              </li>
            </ul>
          </div>
          <div
            class="
              d-flex
              flex-column
              justify-content-end
              align-items-center
              mb-5
            "
          >
            <ul>
              <li class="my-5 py-2">
                <a href="/admin" class="text-decoration-none">
                  <i class="fas fa-user t-deliveboo-green fa-3x"></i>
                  <!-- <span class="text nav-text t-deliveboo-green ml-2"
                    >Login</span
                  > -->
                </a>
              </li>
              <li class="mt-5 py-2">
                <a href="/register" class="text-decoration-none">
                  <i class="far fa-user t-deliveboo-green fa-3x"></i>
                  <!-- <span class="text nav-text t-deliveboo-green m-2"
                    >Register</span
                  > -->
                </a>
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
  name: "Navbar",
  data() {
    return {
      variant: "transparent",
      variants: ["transparent"],
    };
  },
};
</script>

<style lang="scss" scoped>
@media (min-width: 0px) {
  .fas {
    font-size: 33px;
  }
}
@media (min-width: 576px) {
  .fas {
    font-size: 24px;
  }
}

.b-sidebar {
  height: 30px;
}

ul {
  li {
    list-style-type: none;
  }
}

#nav-logo {
  max-width: 30px;
}

#nav-button {
  width: 66px;
}

.b-sidebar #sidebar-1 .bg-light {
  background-color: #00ccbc !important;
}
</style>