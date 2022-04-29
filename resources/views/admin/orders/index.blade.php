@extends('layouts.app')

@section('content')
    <div class="containter">
        <div class="col text-center">
            <h1>Ordini ricevuti</h1>
        </div>
        <div class="col p-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Utente</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Ordine</th>
                        <th scope="col">Totale</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Davìd Croux</th>
                        <td>via delle rose fiorite</td>
                        <td>Pizza Margherita, offre margherita, Pizza Tonno e Cipolle</td>
                        <td>20€</td>
                    </tr>
                    <tr>
                        <th scope="row">David cruz</th>
                        <td>via delle rose fiorite</td>
                        <td>Pizza Margherita, offre margherita, Pizza Tonno e Cipolle</td>
                        <td>20€</td>
                    </tr>
                    <tr>
                        <th scope="row">Davidi crucis</th>
                        <td>via delle rose fiorite</td>
                        <td>Pizza Margherita, offre margherita, Pizza Tonno e Cipolle</td>
                        <td>20€</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
