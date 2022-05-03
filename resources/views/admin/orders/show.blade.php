@extends('layouts.app')

@section('content')
    <div id="orders-show" class="container">
        <div class="col text-center">
            <h1>Dettagli ordine</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <span class="badge badge-pill bg-primary">
                <span class="h4">ordine n° {{ $order->id }}</span>
            </span>
        </div>
        <div class="col">
            <h3>Nome:<span class="mx-3">{{ $order->name }}</span></h3>
            <h3>Cognome:<span class="mx-3">{{ $order->lastname }}</span></h3>
            <p>Indirizzo:<span class="mx-3"> {{ $order->address }}, {{ $order->city }} </span></p>
        </div>
        <div class="col">
            <div class="container">
                <div class="d-flex justify-content-end">
                    <h3 class="total">Totale: <span
                            class="mx-3">{{ $order->total_amount }}&euro;</span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
