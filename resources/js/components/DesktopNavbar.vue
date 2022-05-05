<template>
  <section id="desktop-nav">
    <nav class="navbar-light bg-light shadow">
      <div
        class="
          container-fluid
          d-flex
          justify-content-around
          align-items-center
          py-2
        "
      >
        <router-link to="/home" class="text-decoration-none">
          <div class="d-flex align-items-center">
            <img
              id="logo"
              src="/img/pubb/logo_deliveboo.png"
              class="img-fluid"
              alt="Logo Deliveboo"
            />
            <div class="h1 m-0 pl-3 t-deliveboo-green">DELIVEBOO</div>
          </div>
        </router-link>
        <div class="d-flex justify-content-between">
          <div>
            <router-link to="/home">
              <i class="fas fa-home t-deliveboo-green"></i>
              <span class="text nav-text t-deliveboo-green ml-1">Home</span>
            </router-link>

            <router-link to="/restaurants">
              <i class="fas fa-utensils t-deliveboo-green"></i>
              <span class="text nav-text t-deliveboo-green ml-2"
                >Ristoranti</span
              >
            </router-link>

            <router-link to="/order">
              <i class="fas fa-shopping-bag t-deliveboo-green"></i>
              <span class="text nav-text t-deliveboo-green ml-2">Ordine</span>
            </router-link>
          </div>

          <div>
            <a href="/admin">
              <i class="fas fa-user t-deliveboo-green"></i>
              <span class="text nav-text t-deliveboo-green ml-2">Login</span></a
            >
            <a href="/register">
              <i class="far fa-user t-deliveboo-green"></i>
              <span class="text nav-text t-deliveboo-green ml-2"
                >Register</span
              ></a
            >
          </div>
        </div>

        <!-- Barra di Ricerca -->
        <!-- <form class="d-flex align-items-center">
          <input
            class="form-control mr-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
  </section>
</template>

<script>
export default {
  name: "DesktopNavbar",
};
</script>

<style lang="scss" scoped>
#logo {
  max-width: 60px;
}

i {
  margin-left: 40px;
  font-size: 18px;
}

a {
  text-decoration: none;
}
</style>