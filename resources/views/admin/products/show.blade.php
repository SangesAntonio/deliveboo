@extends('layouts.app')

@section('content')
  <section id="show-product">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card p-5 box-shadow-card">
            <div class="text-center">
              <h6 id="show-title">{{ $product->name }}</h6>
              <hr>
            </div>
            <div class="row pt-5 d-flex justify-content-around">
              {{-- image --}}
              <div class="col-6">
                <img id="img-show" class="img-fluid" src="{{ asset('storage/' . $product->image) }}"
                  alt="{{ $product->name }}">
              </div>

              {{-- ingredienti --}}
              <div class="col-5 d-flex flex-column">
                <h5 class="h3">Ingredienti:</h5>
                <p class="align-self-center">{{ $product->ingredients }}</p>
              </div>

            </div>
            <hr>
            {{-- price --}}
            <p class="py-1 h2 font-weight-bold">Prezzo: <span class="mx-5">{{ $product->price }} € <span></p>

            {{-- form edit + delete --}}
            <div class="row justify-content-end">

              <a href="{{ route('admin.products.edit', $product->id) }}">
                <button class="btn btn-md btn-warning shadow-md mr-1" type="submit">
                  <i class="fas fa-pencil"></i>
                </button>
              </a>
              <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="delete-form">
                @csrf
                @method('delete')

                <button class="btn btn-md btn-danger shadow-md mr-1" type="submit">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="button-back pt-5 pr-4 mb-5 d-flex align-items-center justify-content-end">
        <a href="{{ route('admin.products.index', $product->id) }}" class="btn btn-md btn-info shadow-md text-white"
          type="submit">
          <i class="fas fa-arrow-left"></i> Indietro
        </a>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('js/delete-form.js') }}"></script>
@endsection
