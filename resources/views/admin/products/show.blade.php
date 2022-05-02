@extends('layouts.app')

@section('content')
    <div class="container card p-5">
        <div class="col text-center">
            <h2 id="show-title" style="text-transform: uppercase">{{ $product->name }}</h2>
            <hr>
        </div>
        <div class="row pt-5 d-flex justify-content-around">
            {{-- image --}}
            <div class="col-7">
                <img id="img-show" class="img-fluid" src="{{ $product->image }}" alt="{{ $product->name }}">
            </div>
            
            {{-- description --}}
            <div class="col-5 d-flex flex-column">
                <h5 class="h1">Descrizione:</h5>
                <p class="align-self-center">{{ $product->description }}</p>
            </div>
        </div>
        <hr class="my-5">
        {{-- price --}}
        <p class="py-5 h2 font-weight-bold">Prezzo: <span class="mx-5">{{ $product->price }} € <span></p>

        {{-- form edit + delete --}}
        <div class="row justify-content-end">

            
            <a href="{{ route('admin.products.edit', $product->id) }}">
                <button class="btn btn-md btn-warning shadow-md mr-1" type="submit">
                    <i class="fas fa-pencil"></i>
                </button>
            </a>
            <form action="{{ route('admin.products.destroy', $product->id) }}"
                method="post" class="delete-form">
                @csrf
                @method('delete')

                <button class="btn btn-md btn-danger shadow-md mr-1" type="submit">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete-form.js') }}"></script>
@endsection
