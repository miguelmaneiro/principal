@csrf 
<div class="form-group">
    <label for="nombre">Nombre de la Categoría</label>
        <input type="text"
        name="nombre" 
        id="nombre"
        placeholder="Nombre de la Categoría" 
        value="{{ old('nombre', $categorias->nombre) }}"
        class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border border-primary @enderror" 
        >
</div> 
<div class="form-group">
    <label for="descipcion"> Descripción de la Categoría</label>
        <textarea name="descripcion" 
        id="descripcion"
        cols="30" rows="3" 
        placeholder="Descripción de la Categoría"
        class="form-control bg-light shadow-sm @error('descripcion') is-invalid @else borborder border-primary @enderror" 
        >{{old(trim('descripcion'), trim($categorias->descripcion)) }}</textarea>
</div>
<button class="btn btn-primary btn-md">
    {{ $btnTxt }}
</button> 
<a class="btn btn-outline-danger btn-md" 
href="{{ route('categorias.index') }}">
    Cancelar
</a>