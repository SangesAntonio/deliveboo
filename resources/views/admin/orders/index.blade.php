@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col text-center">
      <h1>Ordini ricevuti</h1>
    </div>
    <div class=" p-5">
      <table class="table table-hover rounded order-list table-borderless">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Utente</th>
            <th scope="col">Indirizzo</th>
            <th scope="col">Email</th>
            <th scope="col">Totale</th>
            <th scope="col">Creato il</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($orders as $order)
          <tbody>
            <tr>
              <th scope="row">{{ $loop->index + 1 }}</th>
              <th>{{ $order->name }} {{ $order->lastname }}</th>
              <td>{{ $order->address }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->total_amount }}&euro;</td>
              <td>{{ $order->created_at }}</td>
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                  data-target="#OrderModal-{{ $order->id }}">
                  Visualizza
                </button>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>
      @foreach ($orders as $order)
        {{-- modale per visualizzare gli ordini singoli --}}
        <div class="modal fade" id="OrderModal-{{ $order->id }}" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Ordine N.{{ $loop->index + 1 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">
                <div class="col">
                  <h3>Informazioni del cliente</h3>
                  <h4>{{ $order->name }} {{ $order->lastname }}</h4>
                  <p>Indirizzo:<span class="mx-3"> {{ $order->address }}, {{ $order->city }} </span></p>
                  <h3>Piatti ordinati</h3>
                </div>
                <hr>
                <div class="col">
                  <div class="container">
                    <div class="d-flex justify-content-end">
                      <table class="table table-hover  table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">Prodotto</th>
                            <th scope="col">Quantità</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Totale</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($order->products as $product)
                            <tr>
                              <td scope="col">{{ $product->name }}</td>
                              <td>{{ $product->pivot->product_quantity }}</td>
                              <td>{{ $product->price }}&euro;</td>
                              <td>{{ $product->price * $product->pivot->product_quantity }}&euro;</td>
                            </tr>
                          @endforeach
                          <tr>
                            <th colspan='3'>Totale Ordine</th>
                            <th>{{ $order->total_amount }}&euro;</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Chiudi</button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
   
    
      <div id="pagination-bar" class="d-flex justify-content-center align-items-center">
        {!! $orders->links() !!}
      </div>
    
   
  </div>
@endsection
