@extends('layouts.app')

@section('additional-css')
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
@endsection

@section('content')
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <div class="container-fluid" id="products">
    <section id="minimal-statistics">
      <div class="row">
        <div class="col-12 my-1">
          <div class="d-flex justify-content-between">
            <h4 class="text-uppercase">Lista Prodotti</h4>
            <a href="{{ route('admin.products.create') }}">
              <button class="btn btn-success shadow-sm"><i class="fa-solid fa-plus"></i> Nuovo Prodotto</button>
            </a>
          </div>
          <p>Prodotti visibili</p>
        </div>
      </div>
      <div class="row">
        @forelse($products as $product)
          <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
            @if ($product->visibility)
              <div class="col-xl-4 col-md-6 col-12 my-2">
                <div class="card box-shadow-card" role="button">
                  <div class="card-content">
                    <div class="card-body p-2">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          @if (isset($product->image))
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                              class="rounded-lg">
                          @else
                            <img class="rounded-lg"
                              src="https://us.123rf.com/450wm/mathier/mathier1905/mathier190500002/134557216-nessuna-immagine-in-miniatura-segnaposto-per-forum-blog-e-siti-web.jpg"
                              alt="nessuna immagine disponibile">
                          @endif
                        </div>
                        <div class="media-body text-right">
                          <h5>{{ $product->name }}</h5>
                          <span>€ {{ $product->price }}</span>
                          <div class="d-flex justify-content-end pt-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}">
                              <div class="mr-1">
                                <button class="btn btn-sm btn-warning shadow-sm" type="submit">
                                  <i class="fas fa-pencil"></i>
                                </button>
                              </div>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
                              class="delete-form">
                              @csrf
                              @method('delete')

                              <div class="ml-1">
                                <button class="btn btn-sm btn-danger shadow-sm" type=" submit">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
                        @if ($product->visibility)
                            <div class="col-xl-4 col-md-6 col-12 my-2">
                                <div class="card" role="button">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                        class="rounded-lg img-fluid">
                                                </div>
                                                <div class="media-body text-right">
                                                    <h3>{{ $product->name }}</h3>
                                                    <span>€ {{ $product->price }}</span>
                                                    <div class="d-flex justify-content-end my-3">
                                                        <a href="{{ route('admin.products.edit', $product->id) }}">
                                                            <div class="mr-1">
                                                                <button class="btn btn-sm btn-warning shadow-sm" type="submit">
                                                                    <i class="fas fa-pencil"></i>
                                                                </button>
                                                            </div>
                                                        </a>
                                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                            method="post" class="delete-form">
                                                            @csrf
                                                            @method('delete')
        
                                                            <div class="ml-1">
                                                                <button class="btn btn-sm btn-danger shadow-sm" type=" submit">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </a>
                @empty
                    <h3>Non ci sono prodotti</h3>
                @endforelse
            </div>
    </section>

    <section id="stats-subtitle">
      <div class="row">
        <div class="col-12 mt-2">
          <p>Prodotti non visibili</p>
        </div>
      </div>

      <div class="row">
        @foreach ($products as $product)
          <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
            @if (!$product->visibility)
              <div class="col-xl-4 col-md-6 col-12 my-2">
                <div class="card box-shadow-card" role="button">
                  <div class="card-content">
                    <div class="card-body p-2">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          @if (isset($product->image))
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                              class="rounded-lg">
                          @else
                            <img class="rounded-lg"
                              src="https://us.123rf.com/450wm/mathier/mathier1905/mathier190500002/134557216-nessuna-immagine-in-miniatura-segnaposto-per-forum-blog-e-siti-web.jpg"
                              alt="nessuna immagine disponibile">
                          @endif
                        </div>
                        <div class="media-body text-right">
                          <h5>{{ $product->name }}</h5>
                          <span>€ {{ $product->price }}</span>
                          <div class="d-flex justify-content-end pt-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}">
                              <div class="mr-1">
                                <button class="btn btn-sm btn-warning shadow-sm" type="submit">
                                  <i class="fas fa-pencil"></i>
                                </button>
                              </div>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
                              class="delete-form">
                              @csrf
                              @method('delete')

                              <div class="ml-1">
                                <button class="btn btn-sm btn-danger shadow-sm" type=" submit">
                                  <i class="fas fa-trash"></i>
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </a>
        @endforeach
      </div>
    </section>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/delete-form.js') }}"></script>
@endsection
