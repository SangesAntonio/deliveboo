<div id="navbar">
    <div class="container">
        <h1> Crea un nuovo prodotto</h1>
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
        
            <form action="{{route('admin.products.store')}}" method="post" class="w-75" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Nome Prodotto</label>
                    <input type="text" class="form-control" id="title" placeholder="Nome prodotto" name="name" value=" {{old('name')}}">
                  </div>

                  <!--Input descrizione-->

                <div class="mb-3">
                    <label for="content" class="form-label">Descrizione Prodotto</label>
                    <textarea class="form-control" id="content" placeholder="Descrivi il prodotto" name="description" >{{old('description')}}</textarea>
                </div>
                
                <!--Input prezzo-->
                  <div class="input-group">
                    <input type="text" class="form-control" value="{{old('price')}}">
                    <div class="input-group-append">
                      <span class="input-group-text">€</span>
                    </div>
                  </div>

                  <!--Input immagine-->

                  <div class="mb- mt-3">
                    <label for="image" class="form-label">Carica immagine</label>
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
        
                  
                  <!--visibility check box-->
                  <div class="col-12">

                      <h4>Visibilità</h4>
                      <label class="switch">
                          <input type="checkbox" checked name="visibility" value=" {{old('visibility')}}">
                          <span class="slider round"></span>
                        </label>
                    </div>
                  <button type="submit" class='btn btn-primary'>Aggiungi Prodotto</button>
            </form>
        </div>
    </div>
</div>