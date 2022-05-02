<nav class="navbar d-flex align-items-center">
    <div class="navbar-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items px-3">
            @guest
                <li class="nav-link m-0">
                    <a class="nav-link" href="{{ route('login') }}"><span
                            class="text nav-text">{{ __('Login') }}</span></a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-link m-0">
                        <a class="nav-link" href="{{ route('register') }}"><span
                                class="text nav-text">{{ __('Registrati') }}</span></a>
                    </li>
                @endif
            @endguest
            @auth
                <li class="nav-link m-0">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa-solid fa-user"></i>
                        <span class="text nav-text">Profilo</span>
                    </a>
                </li>
                <li class="nav-link m-0">
                    <a href="{{ route('admin.orders.index') }}">
                        <i class="fa-solid fa-note-sticky"></i>
                        <span class="text nav-text">Ordini</span>
                    </a>
                </li>

                <li class="nav-link m-0">
                    <a href="{{ route('admin.products.index') }}">
                        <i class="fa-regular fa-rectangle-list"></i>
                        <span class="text nav-text">Prodotti</span>
                    </a>
                </li>

                <li class="nav-link m-0">
                    <a href="{{ route('admin.statistics.index') }}">
                        <i class="fa-solid fa-ranking-star"></i>
                        <span class="text nav-text">Statistiche</span>
                    </a>
                </li>
            @endauth
        </ul>
        <div class="logo h2 m-0 font-weight-bold">DELIVEBOO</div>
    </div>
</nav>
