@extends('layouts.app')
@section('content')
  <section id="home" class= ml-3 pt-2 d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card box-shadow-profile">
            <img class="img-fluid card-img-top w-100" src="{{ Auth::user()->image }}"
              alt="{{ Auth::user()->restaurant_name }}">
            <div class=" card-body d-flex flex-column align-items-center justify-content-center">
              {{-- nome ristorante --}}
              <div class="mb-5">
                <h2 class="card-title user-card-title">{{ Auth::user()->restaurant_name }}</h2>
              </div>

              <div class="mr-auto">
                {{-- email --}}
                <div>
                  <h5><i class="fas fa-envelope"></i></h5>
                  <p class="card-subtitle mb-2">{{ Auth::user()->email }}</p>
                </div>

                {{-- Indirizzo --}}
                <div>
                  <h5><i class="fas fa-map-marker-alt"></i></h5>
                  <address class="card-subtitle">{{ Auth::user()->address }}</address>
                </div>

                {{-- Partita iva --}}
                <div>
                  <i class="fas fa-building"></i>
                  <span>Partita IVA: {{ Auth::user()->vat_number }}</span>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
