@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col text-center">
            <h1>Dettagli ordine</h1>
        </div>
        <div class="col">
            <p>Ordine n° {{ $order->id }}</p>
        </div>
        <div class="col">
            <h3>Nome e Cognome: {{ $order->name }} {{ $order->lastname }}</h3>
            <p>Indirizzo: {{ $order->address }}, {{ $order->city }}</p>
        </div>
        <div class="col">
            <div class="container">
                <div class="d-flex justify-content-end">
                    <h3>Totale:{{$order->total_amount}}&euro;</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
