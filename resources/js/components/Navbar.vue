<template>
    <div class="container">
        <nav class="navbar d-flex align-items-center">
    <div class="navbar-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items px-3">
                <li class="nav-link m-0">
                    <a class="nav-link" href="/admin"><span
                            class="text nav-text">Login</span></a>
                </li>
                    <li class="nav-link m-0">
                        <a class="nav-link" href=""><span
                                class="text nav-text">Register</span></a>
                    </li>
                <li class="nav-link m-0">
                    <a href="">
                        <i class="fa-solid fa-user"></i>
                        <span class="text nav-text">Profilo</span>
                    </a>
                </li>
                <li class="nav-link m-0">
                    <a href="">
                        <i class="fa-solid fa-note-sticky"></i>
                        <span class="text nav-text">Ordini</span>
                    </a>
                </li>

                <li class="nav-link m-0">
                    <a href="">
                        <i class="fa-regular fa-rectangle-list"></i>
                        <span class="text nav-text">Prodotti</span>
                    </a>
                </li>

                <li class="nav-link m-0">
                    <a href="">
                        <i class="fa-solid fa-ranking-star"></i>
                        <span class="text nav-text">Statistiche</span>
                    </a>
                </li>
        </ul>
        <div class="logo h2 m-0 font-weight-bold">DELIVEBOO</div>
    </div>
</nav>
    </div>
</template>

<script>
export default {
    name: "NavBar",
}
</script>

<style lang="scss" scoped>

</style>


 <div class="flex-center position-ref full-height">
    (Route::has('login'))
      <div class="top-right links">
        
          <a href="{{ route('admin.users.index') }}">Pannello ristorante</a>
        
          <a href="{{ route('login') }}">Login</a>

          (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
          
        
      </div>
 