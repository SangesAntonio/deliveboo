@extends('layouts.app')
@section('content')
    <section id="home" class="ml-3 pt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="card box-shadow-profile">
                        <img class="img-fluid card-img-top"
                            style="width: 100%; height: 360px; object-fit: cover; object-position: top center;"
                            src="{{ Auth::user()->image }}" alt="{{ Auth::user()->restaurant_name }}">
                        <div class=" card-body">
                            <h5 class="card-title">{{ Auth::user()->restaurant_name }}</h5>
                            <p class="card-subtitle mb-2">{{ Auth::user()->email }}</p>
                            <address class="card-subtitle">{{ Auth::user()->address }}</address>
                            <p>{{ Auth::user()->description }}</p>
                            <span>Partita IVA: {{ Auth::user()->vat_number }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
