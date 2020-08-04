<form action="{{ route('articulos.index') }}"
method="get" 
autocomplete="false"
role="search">
    <div class="form-group  d-flex align-items-center">
        <div class="input-group">
            <select 
            class="form-control border border-primary"
            name="idcategoria"
            >
                <option value="">Buscar por categoría</option>
                @foreach ($categorias as $categoria) 
                    @if ($idcategoria==$categoria->idcategoria)
                        <option value="{{$categoria->idcategoria}}" selected>{{$categoria->nombre}}</option>
                    @else
                        <option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option>
                    @endif
                @endforeach
            </select>            
            <button type="submit">Buscar</button>
        </div>
    </div>
</form>