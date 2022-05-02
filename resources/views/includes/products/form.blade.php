<div id="product-form">
  <div class="container d-flex flex-column justify-content-center align-items-center">
    @if (!$product->exists)
      <h1> Crea un nuovo prodotto</h1>
    @else
      <h1>Modifica prodotto</h1>
    @endif
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
      <label for="name" class="form-label">Nome Prodotto</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}"
        required trim minlength="2" maxlength="50">
    </div>

    <!--Input descrizione-->

    <div class="mb-3">
      <label for="description" class="form-label">Descrizione Prodotto</label>
      <textarea class="form-control" id="description" name="description" minlength="4"
        maxlength="500">{{ old('description', $product->description) }}</textarea>
    </div>

    <!--Input prezzo-->
    <div class="input-group">
      <label for="price" class="col-12 p-0">Inserisci il prezzo </label>
      <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}" step=".01"
        min="1" max="999" id="price">
      <div class="input-group-append">
        <span class="input-group-text">€</span>
      </div>
    </div>


    <!--Input immagine-->
    <div class="mb-2 mt-3">
      <div class="custom-file">
        <label for="image" class="custom-file-label">Carica immagine</label>
        <input type="file" class="custom-file-input" id="image" name="image">
      </div>
    </div>


    <!--visibility check box-->
    <div class="col-12 d-flex align-items-center p-0 pb-4">
      <label class="form-check-label pr-4 d-flex justify-content-center h5" for="visibility">
        Visibilità
      </label>
      <input type="checkbox" name="visibility" value="1"
        {{ old('visibility', $product->visibility) ? 'checked="checked"' : '' }} id="visibility"
        class='form-check-label'>
    </div>

    <div class="col-12 p-0 d-flex justify-content-between w-100">
      @if ($product->exists)
        <button type="submit" class='btn btn-primary ml-3'>Modifica</button>
        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-md btn-info shadow-md text-white"
          type="submit">
          <i class="fas fa-arrow-left"></i> Indietro
        </a>
      @else
        <button type="submit" class='btn btn-primary'>Aggiungi</button>
        <a href="{{ route('admin.products.index', $product->id) }}" class="btn btn-md btn-info shadow-md text-white"
          type="submit">
          <i class="fas fa-arrow-left"></i> Indietro
        </a>
      @endif
    </div>
    </form>
  </div>
</div>
