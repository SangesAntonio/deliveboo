@extends('layouts.app')

@section('content')
    <div class="container card p-5">
        <div class="col text-center">
            <h2 style="text-transform: uppercase">{{ $product->name }}</h2>
        </div>
        <div class="row pt-5 d-flex justify-content-around">
            <div class="col-3">
                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                <p>Prezzo: {{ $product->price }} €</p>
            </div>
            <div class="col-5">
                <h5>Descrizione:</h5>
                <p>{{ $product->description }}</p>
            </div>
            <div class="col-3">
                <h5>Allergeni:</h5>
                {{-- mettere allergeni --}}
            </div>
        </div>

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
