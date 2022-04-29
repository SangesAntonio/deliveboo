@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <div class="grey-bg container-fluid" id="products">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mb-1">
                    <h4 class="text-uppercase">Lista Prodotti</h4>
                    <p>Prodotti visibili</p>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
                        @if ($product->visibility)
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="card" role="button">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                        class="rounded-lg">
                                                </div>
                                                <div class="media-body text-right">
                                                    <h3>{{ $product->name }}</h3>
                                                    <span>€ {{ $product->price }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                                    <button class="btn btn-sm btn-warning shadow-sm mr-1" type="submit">
                                                        <i class="fas fa-pencil"></i>
                                                    </button>
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                    method="post" class="delete-form">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="btn btn-sm btn-danger shadow-sm" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
                <div class="col-12">

                    <p>Prodotti non visibili</p>
                </div>
            </div>

            <div class="row">
                @forelse($products as $product)
                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
                        @if (!$product->visibility)
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="card" role="button">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                        class="rounded-lg">
                                                </div>
                                                <div class="media-body text-right">
                                                    <h3>{{ $product->name }}</h3>
                                                    <span>€ {{ $product->price }}</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                                    <button class="btn btn-sm btn-warning shadow-sm mr-1" type="submit">
                                                        <i class="fas fa-pencil"></i>
                                                    </button>
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                    method="post" class="delete-form">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="btn btn-sm btn-danger shadow-sm" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
    </div>
@endsection
