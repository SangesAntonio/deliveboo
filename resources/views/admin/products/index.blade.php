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

    <div class="grey-bg container-fluid">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Lista Prodotti</h4>
                    <p>Prodotti visibili</p>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    @if ($product->visibility)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card" role="button">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="media-body text-right">
                                                <h3>{{ $product->name }}</h3>
                                                <span>€ {{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
                    @if (!$product->visibility)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card" role="button">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                            </div>
                                            <div class="media-body text-right">
                                                <h3>{{ $product->name }}</h3>
                                                <span>€ {{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <h3>Non ci sono prodotti</h3>
                @endforelse
            </div>
        </section>
    </div>
@endsection
