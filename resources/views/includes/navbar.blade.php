<div id="laravel-mobile">

  <div class="container-fluid header-logo py-4 w-100 slider-border">
    <div class="row text-center">
      <div class="col-12 d-flex justify-content-center align-items-center">
        <img class="logo" src="{{ asset('/img/pubb/deliveboo_loader.gif') }}" alt="logo"
          class="rounded-lg">
        <h3 class="text-logo">Deliveboo</h3>
      </div>
    </div>
  </div>

  <nav class="sidebar d-none d-lg-block">
    <header>
      <div class="image-text">
        <span class="image">
          @guest
          @else
            <img src="{{ asset('/storage/' . Auth::user()->image) }}" alt="{{ Auth::user()->restaurant_name }}"
              class="rounded-lg">
          @endguest
        </span>

        <div class="text logo-text">
          @auth
            <span class="h5"> {{ Auth::user()->restaurant_name }}</span>
          @endauth
        </div>
      </div>

    </header>

    <div class="menu-bar">
      <div class="menu">
        @guest
          <li class="nav-link">
            <a class="nav-link" href="{{ route('login') }}"><span
                class="text nav-text">{{ __('Login') }}</span></a>
          </li>
          @if (Route::has('register'))
            <li class="nav-link">
              <a class="nav-link" href="{{ route('register') }}"><span
                  class="text nav-text">{{ __('Registrati') }}</span></a>
            </li>
          @endif
        @endguest
        @auth
          <hr>
          <ul class="menu-links">
            <li class="nav-link">
              <a href="{{ route('admin.users.index') }}">
                <i class="fa-solid fa-user"></i>
                <span class="text nav-text">Profilo</span>
              </a>
            </li>
            <li class="nav-link">
              <a href="{{ route('admin.orders.index') }}">
                <i class="fa-solid fa-note-sticky"></i>
                <span class="text nav-text">Ordini</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="{{ route('admin.products.index') }}">
                <i class="fa-regular fa-rectangle-list"></i>
                <span class="text nav-text">Prodotti</span>
              </a>
            </li>

            <li class="nav-link">
              <a href="{{ route('admin.statistics.index') }}">
                <i class="fa-solid fa-ranking-star"></i>
                <span class="text nav-text">Statistiche</span>
              </a>
            </li>

            <hr>

            <li class="nav-link">
              <a href="/">
                <i class="fas fa-home t-deliveboo-green"></i>
                <span class="text nav-text">Home</span>
              </a>
            </li>

          </ul>
        </div>
        <div class="bottom-content d-inline">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none text nav-text">
            @csrf
          </form>
          <hr>
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="d-flex flex-row pb-3 text-decoration-none">
            <i class="fa-solid fa-right-from-bracket text-danger mx-2"></i>
            <span class="text nav-text text-danger">{{ __('Logout') }} </span>
          </a>
        </div>
      </div>
    @endauth
  </nav>

  <nav id="mobile-nav" class="fixed-bottom d-lg-none">
    <div class="container-fluid bg-light pt-3 rounded-custom px-3">
      <div class="row">
        <div class="col-12">
          <ul class="d-flex justify-content-around align-items-center pt-1">
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                ">
                <i class="fas fa-user t-deliveboo-green fa-2x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Profilo</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.orders.index') }}"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                ">
                <i class="fas fa-note-sticky t-deliveboo-green fa-2x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Ordini</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.products.index') }}"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                ">
                <i class="fas fa-rectangle-list t-deliveboo-green fa-2x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Prodotti</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.statistics.index') }}"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                ">
                <i class="fa-solid fa-ranking-star t-deliveboo-green fa-2x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Statistiche</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/"
                class="
                  text-decoration-none
                  d-flex
                  flex-column
                  align-items-center
                ">
                <i class="fa-solid fa-home t-deliveboo-green fa-2x"></i>
                <span class="pt-1 text nav-text t-deliveboo-green">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="text nav-text">
                @csrf
              </form>
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="d-flex flex-column text-decoration-none align-items-center">
                <i class="fa-solid fa-right-from-bracket text-danger fa-2x"></i>
                <span class="pt-1 text nav-text text-danger">{{ __('Logout') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>
