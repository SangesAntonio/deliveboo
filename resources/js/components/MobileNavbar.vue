<template>
  <section id="mobile-navbar" class="fixed-bottom">
    <div class="container-fluid bg-light pt-3 rounded-custom px-3">
      <div class="row">
        <div class="col-12">
          <ul class="d-flex justify-content-around align-items-center pt-1">
            <li class="nav-item">
              <router-link
                exact
                to="/"
                :class="{ active: $route.name === 'home' }"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                "
              >
                <i class="fas fa-home t-deliveboo-green fa-1x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Home</span>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link
                exact
                to="/restaurants"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                "
              >
                <i class="fas fa-utensils t-deliveboo-green fa-1x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green"
                  >Ristoranti</span
                >
              </router-link>
            </li>

            <li class="nav-item">
              <a
                href="/admin"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                "
              >
                <i class="fas fa-user t-deliveboo-green fa-1x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a
                href="/register"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                "
              >
                <i class="far fa-user t-deliveboo-green fa-1x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green"
                  >Register</span
                >
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "MobileNavbar",
};
</script>

<style lang="scss" scoped>
.rounded-custom {
  border-radius: 15px 15px 0 0;
}

ul {
  li {
    list-style-type: none;
  }
}

span {
  text-transform: uppercase;
  font-family: "Koulen", cursive;
  font-weight: 500;
  font-size: 18px;
}

a.active span {
  color: #007377;
  font-size: 20px;
}
a.active i {
  font-size: 1.5em;
  color: #007377;
}
</style>