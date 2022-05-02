@extends('layouts.app')
@section('content')
  <section id="home" class="h-100 ml-3 pt-2 d-flex align-items-center justify-content-center">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 h-100">
          <div class="card box-shadow-profile h-100">
            <img class="img-fluid card-img-top w-100" src="{{ asset('/storage/' . Auth::user()->image) }}"
              alt="{{ Auth::user()->restaurant_name }}">
            <div class=" card-body d-flex flex-column align-items-center justify-content-center h-100">
              {{-- nome ristorante --}}
              <div class="mb-2">
                <h2 class="card-title text-capitalize">{{ Auth::user()->restaurant_name }}</h2>
              </div>

              <div class="mr-auto">
                {{-- email --}}
                <div>
                  <h5>Email:</h5>
                  <p class="card-subtitle mb-2">{{ Auth::user()->email }}</p>
                </div>

                {{-- Indirizzo --}}
                <div>
                  <h5>Indirizzo:</h5>
                  <address class="card-subtitle">{{ Auth::user()->address }}</address>
                </div>

                {{-- Partita iva --}}
                <div>
                  <h5>P.IVA:</h5>
                  <span>Partita IVA: {{ Auth::user()->vat_number }}</span>
                </div>


                {{-- categorie --}}
                <div>
                  <h5>Categorie:</h5>
                  @forelse (Auth::user()->categories as $category)
                    <span class="card-subtitle mb-2">{{ $category->name }}@if (!$loop->last)
                        ,
                      @endif
                    </span>
                    @empty
                      <span>-</span>
                    @endforelse
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection
