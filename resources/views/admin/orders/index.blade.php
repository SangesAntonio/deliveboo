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

                <h5 class="modal-title" id="exampleModalLongTitle">Ordine N.{{ $order->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body border">
                <div class="col">
                  <h2>Informazioni del cliente</h2>
                  <h3>{{ $order->name }} {{ $order->lastname }}</h3>
                  <p>Indirizzo:<span class="mx-3"> {{ $order->address }}, {{ $order->city }} </span></p>
                  <h2>Piatti ordinati</h2>
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
                          <tr>
                            <td scope="col">Margherita</td>
                            <td>2</td>
                            <td>4&euro;</td>
                            <td>8&euro;</td>
                          </tr>
                          <tr>
                            <td scope="col">Hot Dog</td>
                            <td>1</td>
                            <td>3&euro;</td>
                            <td>3&euro;</td>
                          </tr>
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
    @if ($order->id > 8)
      <div id="pagination-bar" class="d-flex justify-content-center align-items-center">
        {!! $orders->links() !!}
      </div>
    @endif
  </div>
@endsection
