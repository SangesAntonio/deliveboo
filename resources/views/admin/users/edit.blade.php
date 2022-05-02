@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Aggiorna il tuo ristorante') }}</div>

            {{-- ERRORI FORM --}}
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="card-body">
            <form action="{{ route('admin.users.update', Auth::user()->id) }}" method="POST"
              enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-group row">
                <label for="restaurant_name"
                  class="col-md-4 col-form-label text-md-right">{{ __('Nome ristorante') }}</label>

                <div class="col-md-6">
                  <input id="restaurant_name" type="text" class="form-control" name="restaurant_name"
                    @error('restaurant_name') is-invalid @enderror"
                    value="{{ old('restaurant_name', $user->restaurant_name) }}" required autocomplete="restaurant_name"
                    autofocus>

                  @error('restaurant_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                <div class="col-md-6">
                  <input id="address" type="text" class="form-control" name="address"
                    @error('address') is-invalid @enderror value="{{ old('address', $user->address) }}" required
                    autocomplete="address">

                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>

                <div class="col-md-6">
                  <input id="vat_number" type="text" class="form-control" name="vat_number"
                    @error('vat_number') is-invalid @enderror value="{{ old('vat_number', $user->vat_number) }}"
                    required autocomplete="vat_number">

                  @error('vat_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="image"
                  class="col-md-4 col-form-label text-md-right">{{ __('Immagine ristorante') }}</label>

                <div class="col-md-6">
                  <input type="file" class="file-input" id="image" name="image" @error('image') is-invalid @enderror>

                  @error('image')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12 pt-4">
                  <div
                    class=" d-flex flex-wrap justify-content-center align-items-center @error('categories') is-invalid @enderror">
                    @foreach ($categories as $category)
                      <div class="form-check mr-3">
                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                          id="category-{{ $category->id }}" name="categories[]"
                          @if (in_array($category->id, old('categories', $user_categories_ids ?? []))) checked @endif>
                        <label class="form-check-label"
                          for="category-{{ $category->id }}">{{ $category->name }}</label>
                      </div>
                    @endforeach
                  </div>
                  @error('tags')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
          </div>
          <div class="form-group row mb-2">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Aggiorna') }}
              </button>
              
              {{-- previous --}}
            <a href="{{ url()->previous() }}" class="btn btn-md btn-info shadow-md text-white"
              type="submit">
              <i class="fas fa-arrow-left"></i> Indietro
            </a>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
