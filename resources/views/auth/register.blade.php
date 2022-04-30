@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Registra il tuo ristorante') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label for="restaurant_name"
                  class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}</label>

                <div class="col-md-6">
                  <input id="restaurant_name" type="text" class="form-control" name="restaurant_name" value="" required
                    autocomplete="restaurant_name" autofocus>


                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="" required
                    autocomplete="email">

                </div>
              </div>

              <div class="form-group row">
                <label for="email_verified_at"
                  class="col-md-4 col-form-label text-md-right">{{ __('Verifica Email') }}</label>

                <div class="col-md-6">
                  <input id="email_verified_at" type="email" class="form-control" value="" required
                    autocomplete="email_verified_at">

                </div>
              </div>

              <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                <div class="col-md-6">
                  <input id="address" type="text" class="form-control" name="address" value="" required
                    autocomplete="address" autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required
                    autocomplete="new-password">

                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm"
                  class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                    required autocomplete="new-password">
                </div>
              </div>
              <div class="form-group row">
                <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                <div class="col-md-6">
                  <input id="vat_number" type="text" class="form-control" name="vat_number" value="" required
                    autocomplete="vat_number" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <div class="custom-file">
                  <label for="image" class="">Carica immagine</label>
                  <input type="file" class="custom-file-input" id="image" name="image">
                </div>
              </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
