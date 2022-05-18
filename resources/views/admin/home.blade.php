@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-deliveboo-green text-center text-white h5">{{ __('Hai effettuato l\'accesso!') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Inizia a navigare nel tuo pannello di controllo') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
