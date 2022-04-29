@extends('layouts.app')

@section('content')
    <div class="container card p-5">
        <div class="col text-center">
            <h2 style="text-transform: uppercase">{{ $product->name }}</h2>
        </div>
        <div class="row pt-5 d-flex justify-content-around">
            <div class="col-3">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <p>Prezzo: {{ $product->price }} €</p>
            </div>
            <div class="col-5">
                <h5>Descrizione:</h5>
                <p>{{ $product->description }}</p>
            </div>
            <div class="col-3">
                <h5>Allergeni:</h5>
                {{-- mettere allergeni --}}
            </div>
        </div>
    </div>
@endsection
