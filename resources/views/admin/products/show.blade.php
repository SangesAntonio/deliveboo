@extends('layouts.app')

@section('content')
  <section id="details">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card p-5 product-detail">
            <div class="text-center">
              <h2 class="t-deliveboo-green">{{ $product->name }}</h2>
            </div>
            <div class="row">
              {{-- image --}}
              <div class="col-12">
                <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
              </div>

              {{-- ingredienti --}}
              <div class="col-6 d-flex flex-column pt-3">
                <h3>Ingredienti:</h3>
                <p>{{ $product->ingredients }}</p>
                {{-- price --}}
                <p><span class="mr-2 font-weight-bold">Prezzo:</span> {{ $product->price }} €
                </p>
              </div>
            </div>
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
      <div class="button-back pt-5 pr-4 d-flex align-items-center justify-content-start">
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
