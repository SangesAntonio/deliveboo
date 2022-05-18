@extends('layouts.app')
@section('content')
  <section id="home" class="pb-5">
    <div class="container-lg container-sm-fluid">
      <div class="row">
        <div
          class="col d-flex 
        flex-row flex-xl-column flex-wrap
        justify-content-cente
        align-items-center
        justify-content-xl-start
        align-items-xl-center">
          <div class="col-12 col-xl-6 card-res">
            {{-- image --}}
            <img class="rounded img-fluid w-100" src="{{ asset('/storage/' . Auth::user()->image) }}"
              alt="{{ Auth::user()->restaurant_name }}">
          </div>
          <div class="col-12 col-xl-6 mb-3 pt-md-2">
            {{-- nome ristorante --}}
            <p class="d-flex align-items-center">
              <span
                class="h1 mb-0 mr-4 text-uppercase card-title user-card-title d-inline">{{ Auth::user()->restaurant_name }}</span>
              {{-- edit button --}}
              <a id="button-edit-user-index" href="{{ route('admin.users.edit', Auth::user()->id) }}">
                <button class="btn btn-sm info-cs" type="submit">
                  <i class="fas fa-pencil"></i>
                </button>
              </a>
            </p>

            {{-- email --}}
            <p>
              <i class="fas fa-envelope mr-3"></i>
              <span><strong>Email:</strong>{{ Auth::user()->email }}</span>
            </p>

            {{-- Indirizzo --}}
            <p>
              <i class="fas fa-map-marker-alt mr-3"></i>
              <span><strong>Indirizzo:</strong> {{ Auth::user()->address }}</span>
            </p>

            {{-- Telefono --}}
            <p>
              <i class="fas fa-phone mr-3"></i>
              <span><strong>Tel:</strong>{{ Auth::user()->phone_number }}</span>
            </p>

            {{-- Partita iva --}}
            <p>
              <i class="fas fa-building mr-3"></i>
              <span><strong>P. IVA:</strong> IT{{ Auth::user()->vat_number }}</span>
            </p>


            {{-- categorie --}}
            <p>
              <i class="fa-solid fa-bowl-food"></i>
              <span class="ml-3"><strong>Categorie:</strong></span>
              @forelse (Auth::user()->categories as $category)
                <span class="mb-2">{{ $category->name }}@if (!$loop->last)
                    -
                  @endif
                </span>
                @empty
                  <span>Nessuna categoria impostata</span>
                @endforelse
              </p>
            </div>
          </div>
        </div>
    </section>
  @endsection
