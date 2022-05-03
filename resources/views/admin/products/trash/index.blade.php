@extends('layouts.app')

@section('additional-css')
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <div class="container-fluid" id="products">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 my-1">
                    <div class="d-flex justify-content-between">
                        <h4 class="text-uppercase">Lista Prodotti nel cestino</h4>
                        <a href="{{ route('admin.products.create') }}">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-success shadow-sm text-white"><i
                                    class="fa-solid fa-chevron-left"></i> Torna ai prodotti</a>
                        </a>
                    </div>
                    <p>Prodotti visibili</p>
                </div>
            </div>

            {{-- lista prodotti visibili --}}
            <div class="row">
                @forelse($products as $product)
                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
                        @if ($product->visibility)
                            <div class="col-xl-4 col-md-6 col-12 my-2">
                                <div class="card box-shadow-card" role="button">
                                    <div class="card-content">
                                        <div class="card-body p-2">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    @if (isset($product->image))
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            alt="{{ $product->name }}" class="rounded-lg img-fluid">
                                                    @else
                                                        <img class="rounded-lg img-fluid"
                                                            src="https://us.123rf.com/450wm/mathier/mathier1905/mathier190500002/134557216-nessuna-immagine-in-miniatura-segnaposto-per-forum-blog-e-siti-web.jpg"
                                                            alt="nessuna immagine disponibile">
                                                    @endif
                                                </div>
                                                <div class="media-body text-right">
                                                    <h5>{{ $product->name }}</h5>
                                                    <span>€ {{ $product->price }}</span>
                                                    <div class="d-flex justify-content-end pt-2">
                                                        <a href="{{ route('admin.products.edit', $product->id) }}">
                                                            <div class="mr-1">
                                                                <button class="btn btn-sm btn-warning shadow-sm"
                                                                    type="submit">
                                                                    <i class="fas fa-pencil"></i>
                                                                </button>
                                                            </div>
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.products.trash.restore', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Ripristina</button>
                                                        </form>

                                                        {{-- modale eliminazione --}}
                                                        <div class="ml-1">
                                                            <button class="btn btn-sm btn-danger shadow-sm" type=" submit"
                                                                data-toggle="modal"
                                                                data-target="#ModalTrash{{ $product->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal fade" id="ModalTrash{{ $product->id }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Conferma eliminazione prodotto</h5>

                                                                    </div>
                                                                    <div class="modal-body d-flex justify-content-start">
                                                                        Vuoi eliminare: {{ $product->name }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Annulla</button>

                                                                        {{-- form eliminazione modale --}}
                                                                        <form
                                                                            action="{{ route('admin.products.trash.destroy', $product->id) }}"
                                                                            method="post" class="delete-form">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Elimina</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </a>
                @empty
                    <h3 class="px-3">Non ci sono prodotti</h3>
                @endforelse
            </div>
        </section>

        <section id="stats-subtitle">
            <div class="row">
                <div class="col-12 mt-2">
                    <p>Prodotti non visibili</p>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <a href="{{ route('admin.products.show', $product->id) }}" class="text-decoration-none">
                        @if (!$product->visibility)
                            <div class="col-xl-4 col-md-6 col-12 my-2">
                                <div class="card box-shadow-card" role="button">
                                    <div class="card-content">
                                        <div class="card-body p-2">
                                            <div class="media d-flex">
                                                <div class="align-self-center">
                                                    @if (isset($product->image))
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            alt="{{ $product->name }}" class="rounded-lg">
                                                    @else
                                                        <img class="rounded-lg"
                                                            src="https://us.123rf.com/450wm/mathier/mathier1905/mathier190500002/134557216-nessuna-immagine-in-miniatura-segnaposto-per-forum-blog-e-siti-web.jpg"
                                                            alt="nessuna immagine disponibile">
                                                    @endif
                                                </div>
                                                <div class="media-body text-right">
                                                    <h5>{{ $product->name }}</h5>
                                                    <span>€ {{ $product->price }}</span>
                                                    <div class="d-flex justify-content-end pt-2">
                                                        <a href="{{ route('admin.products.edit', $product->id) }}">
                                                            <div class="mr-1">
                                                                <button class="btn btn-sm btn-warning shadow-sm"
                                                                    type="submit">
                                                                    <i class="fas fa-pencil"></i>
                                                                </button>
                                                            </div>
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.products.trash.restore', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('patch')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Ripristina</button>
                                                        </form>
                                                        <div class="ml-1">
                                                            <button class="btn btn-sm btn-danger shadow-sm" type=" submit"
                                                                data-toggle="modal"
                                                                data-target="#ModalTrash{{ $product->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal fade" id="ModalTrash{{ $product->id }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Conferma eliminazione prodotto</h5>

                                                                    </div>
                                                                    <div class="modal-body d-flex justify-content-start">
                                                                        Vuoi eliminare: {{ $product->name }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Annulla</button>

                                                                        {{-- form eliminazione modale --}}
                                                                        <form
                                                                            action="{{ route('admin.products.trash.destroy', $product->id) }}"
                                                                            method="post" class="delete-form">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Elimina</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('js/delete-form.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
