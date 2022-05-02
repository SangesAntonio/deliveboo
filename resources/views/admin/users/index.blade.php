@extends('layouts.app')
@section('content')
  <section id="home" class="ml-3 pt-2 pb-4 d-flex align-items-center justify-content-center">
    <div class="container-lg container-sm-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card box-shadow-profile">
            {{-- image --}}
            <img class="img-fluid card-img-top w-100" src="{{ asset('/storage/' . Auth::user()->image) }}"
              alt="{{ Auth::user()->restaurant_name }}">
            {{-- edit button --}}
            <a id="button-edit-user-index" href="{{ route('admin.users.edit', Auth::user()->id) }}">
              <div class="mr-1">
                <button class="btn btn-md btn-warning shadow-md" type="submit">
                  <i class="fas fa-pencil"></i>
                </button>
              </div>
            </a>

            <div class=" card-body d-flex flex-column align-items-center justify-content-center">

              {{-- nome ristorante --}}
              <div class="mb-5 d-flex ">
                <h2 class="card-title user-card-title">{{ Auth::user()->restaurant_name }}</h2>
                <a href="{{ route('admin.users.edit', Auth::user()->id) }}" class="ml-2">
                  <div class="mr-1">

                  </div>
                </a>
              </div>


              <div class="mr-auto w-100">
                <hr>
                {{-- email --}}
                <div class="d-flex align-items-center">
                  <h5><i class="fas fa-envelope h1"></i></h5>
                  <p class="card-subtitle mb-2 mx-4">{{ Auth::user()->email }}</p>
                </div>
                <hr>

                {{-- Indirizzo --}}
                <div class="d-flex align-items-center">
                  <h5><i class="fas fa-map-marker-alt h1"></i></h5>
                  <address class="card-subtitle mx-4">{{ Auth::user()->address }}</address>
                </div>
                <hr>

                {{-- Partita iva --}}
                <div class="d-flex align-items-center">
                  <i class="fas fa-building h1"></i>
                  <span class="mx-4">Partita IVA: {{ Auth::user()->vat_number }}</span>
                </div>
                <hr>


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
