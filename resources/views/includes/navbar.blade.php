<div id="app">

  <div class="container-fluid header-logo py-4 w-100">
    <div class="row text-center">
      <div class="col-12">
        <h3>Deliveboo</h3>
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
            <span class="name"> {{ Auth::user()->restaurant_name }}</span>
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
          <ul class="menu-links">
            <h6>Pannello di controllo</h6>
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
            
            <h6>Vai al sito</h6>
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
          <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="d-flex flex-row pb-3 text-decoration-none">
            <i class="fa-solid fa-right-from-bracket text-danger mx-2"></i>
            <span class="text nav-text text-danger">{{ __('Logout') }} </span>
          </a>
        </div>
        </li>
      </div>
    @endauth
</div>
</nav>
</div>
