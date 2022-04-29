<div id="navbar">
    <div class="container">
        @if (!$product->exists)
            <h1> Crea un nuovo prodotto</h1>
        @else
            <h1>Modifica prodotto</h1>
        @endif
        <div class="container mt-4 ">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($product->exists)
                <form action="{{ route('admin.products.update', $product->id) }}" method="post" class="w-75"
                    enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form action="{{ route('admin.products.store') }}" method="post" class="w-75"
                        enctype="multipart/form-data">
            @endif
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nome Prodotto</label>
                <input type="text" class="form-control" id="title" placeholder="Nome prodotto" name="name"
                    value=" {{ old('name', $product->name) }}" required trim minlength="2" maxlength="50">
            </div>

            <!--Input descrizione-->

            <div class="mb-3">
                <label for="content" class="form-label">Descrizione Prodotto</label>
                <textarea class="form-control" id="content" placeholder="Descrivi il prodotto" name="description" minlength="4"
                    maxlength="500">{{ old('description', $product->description) }}</textarea>
            </div>

            <!--Input prezzo-->
            <div class="input-group">
                <label for="price" class="col-12 p-0">Inserisci il prezzo </label>
                <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}"
                    step=".01" min="1" max="999">
                <div class="input-group-append" id="price">
                    <span class="input-group-text">€</span>
                </div>
                

            <!--Input immagine-->
            <div class="mb-2 mt-3">
                <label for="image" class="form-label">Carica immagine</label>
                <input type="url" class="form-control" id="image" name="image"
                    value="{{ old('image', $product->image) }}">
            </div>


            <!--visibility check box-->
            <div class="col-12">
                <h4>Visibilità</h4>
                <label class="form-check-label" for="visibility"></label>
                <input type="checkbox" name="visibility" value="1"
                    {{ old('visibility', $product->visibility) ? 'checked="checked"' : '' }}id="visibility"
                    class='form-check-label'>
            </div>
            {{-- <form action="{{ route('admin.products.toggle', $product->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-sm" type="submit"><i
                                class="fa-solid fa-toggle-{{ $product->visibility ? 'on' : 'off' }}"></i>
                        </button>
                    </form> --}}


                   @if($product->exists) 
                   <div>

                   
                    <button type="submit" class='btn btn-primary'>Modifica</button>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-md btn-info shadow-md text-white" type="submit">
                            Torna indietro
                        <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                  @else
                  
                  <button type="submit" class='btn btn-primary'>Aggiungi</button>
                  @endif
        </div>
    </div>
</div>
