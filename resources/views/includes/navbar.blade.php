<div id="app">

  <div class="container-fluid header-logo py-4">
    <div class="row text-center">
      <div class="col-12">
        {{-- <img src="{{ asset('images/boolpresslogo.png') }}" alt="boolpress logo"> --}}
        <h3>Deliveboo</h3>
      </div>
    </div>
  </div>

  <nav class="sidebar">
    <header>
      <div class="image-text">
        <span class="image">
          @guest
          @else
            <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->restaurant_name }}" class="rounded-lg">
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

          </ul>
        </div>
        <div class="bottom-content">
          <li class="nav-link dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" v-pre>
              <span class="text nav-text">{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"><i
                  class="fa-solid fa-right-from-bracket"></i>
                <span class="text nav-text">{{ __('Logout') }}</span>

              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none text nav-text">
                @csrf
              </form>
            </div>
          </li>
        </div>
      @endauth
    </div>
  </nav>
</div>
