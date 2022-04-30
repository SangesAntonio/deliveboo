@extends('layouts.app')

@section('content')
  <section id="show-product">
    <div class="container">
      <div class="card p-5 box-shadow-card">
        <div class="col text-center">
          <h2 style="text-transform: uppercase">{{ $product->name }}</h2>
        </div>
        <div class="row pt-3 d-flex justify-content-around">
          <div class="col-3">
            @if (isset($product->image))
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-lg">
            @else
              <img class="rounded-lg"
                src="https://us.123rf.com/450wm/mathier/mathier1905/mathier190500002/134557216-nessuna-immagine-in-miniatura-segnaposto-per-forum-blog-e-siti-web.jpg"
                alt="nessuna immagine disponibile">
            @endif
          </div>
          <div class="col-5">
            <h5>Descrizione:</h5>
            <p>{{ $product->description }}</p>
            <h5>Prezzo:</h5>
            <p> {{ $product->price }} €</p>
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
      <div class="button-back pt-5 pr-4 d-flex align-items-center justify-content-end">
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
