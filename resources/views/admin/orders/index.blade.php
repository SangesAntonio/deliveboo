@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col text-center">
            <h1>Ordini ricevuti</h1>
        </div>
        <div class=" p-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Utente</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Email</th>
                        <th scope="col">Totale</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @foreach($orders as $order)
                <tbody>
                    <tr>
                        <th scope="row">{{$order->name}}</th>
                        <td>{{$order->address}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->total_amount}}&euro;</td>
                        <td><a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-info">Dettagli</a></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        @if($order->id > 8)
        <div id="pagination-bar" class="d-flex justify-content-center align-items-center">
            {!! $orders->links() !!}
        </div>
        @endif
    </div>
@endsection
