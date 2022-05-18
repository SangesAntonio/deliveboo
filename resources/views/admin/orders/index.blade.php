@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table order-list table-borderless">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Utente</th>
              <th scope="col">Creato il</th>
              <th></th>
            </tr>
          </thead>
          @foreach ($orders as $order)
            <tbody>
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <th>{{ $order->name }} {{ $order->lastname }}</th>
                <td>{{ $order->created_at }}</td>
                <td>
                  <button type="button" class="btn info-cs" data-toggle="modal"
                    data-target="#OrderModal-{{ $order->id }}">
                    Visualizza
                  </button>
                </td>
              </tr>
            </tbody>
          @endforeach
        </table>
      </div>
      @foreach ($orders as $order)
        {{-- modale per visualizzare gli ordini singoli --}}
        <div class="modal fade" id="OrderModal-{{ $order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
              <div class="modal-header">
                <h5 class="modal-title ml-3" id="exampleModalLongTitle">Ordine N.{{ $loop->index + 1 }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-12">
                  <h5>Informazioni del cliente:</h5>
                  <h6 class="ml-3"><strong>{{ $order->name }} {{ $order->lastname }}</strong></h6>
                  <p class="mb-0 ml-3"><strong>Indirizzo:</strong><span class="ml-3">
                      {{ $order->address }},
                      {{ $order->city }} </span></p>
                  <p class="ml-3"><strong>Email:</strong><span class="ml-3"> {{ $order->email }}
                    </span></p>
                </div>
                <br />
                <div class="col-12">
                  <h5>Piatti ordinati:</h5>
                  <div>
                    <table class="table table-borderless">
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
          </div>
        </div>
      @endforeach
    </div>


    <div id="pagination-bar" class="d-flex justify-content-center align-items-center">
      {!! $orders->links() !!}
    </div>
  </div>
@endsection
