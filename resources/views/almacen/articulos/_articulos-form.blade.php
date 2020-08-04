@csrf 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre del Artículo</label>
                <input type="text" 
                name="nombre" 
                id="nombre"
                placeholder="Nombre del Artículo" 
                value="{{ old('nombre', $articulos->nombre) }}"
                class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border border-primary @enderror" 
                >
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="idcategoria">Categoría del Artículo</label>
            <select name="idcategoria" 
            id="idcategoria" 
            class="form-control form-control bg-light shadow-sm @error('idcategoria') is-invalid @else border border-primary @enderror" 
            >
                <option value=""></option>
                @foreach ($categorias as $categoria)
                    @if ($categoria->idcategoria==old('idcategoria') ||
                        $categoria->idcategoria == $idcategoria)
                        <option value="{{$categoria->idcategoria}}" selected>{{$categoria->nombre}}</option>
                    @else                       
                        <option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Códgigo del Artículo</label>
                <input type="text" 
                name="codigo" 
                id="codigo"
                placeholder="Código del Artículo" 
                value="{{ old('codigo', $articulos->codigo) }}"
                class="form-control bg-light shadow-sm @error('codigo') is-invalid @else border border-primary @enderror" 
                >
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Inventario de Entrada</label>
                <input type="text" 
                name="stock" 
                id="stock"
                placeholder="Stock del Artículo" 
                value="{{ old('stock', $articulos->stock) }}"
                class="form-control bg-light shadow-sm @error('stock') is-invalid @else border border-primary @enderror" 
                >
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="descipcion"> Descripción del Artículo</label>
            <textarea name="descripcion" 
            id="descripcion"
            cols="30" rows="3" 
            placeholder="Descripción del Artículo"
            class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else border border-primary @enderror" 
            >{{old(trim('descripcion'), trim($articulos->descripcion)) }}</textarea>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="imagen"> Descripción del Artículo</label>
            @if ($articulos->imagen!="")
                <img src="{{asset('img/articulos/')}}/{{$articulos->imagen}}" alt="Articulo" style="max-width: 120px">
            @endif
            <input type="file" name="imagenInput" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile">Select file</label>
        </div> 
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button class="btn btn-primary btn-md">
            {{ $btnTxt }}
        </button> 
        <a class="btn btn-outline-danger btn-md" 
        href="{{ route('articulos.index') }}">
            Cancelar
        </a>
    </div>
</div>





