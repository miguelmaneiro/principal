<form action="{{ route('ingresos.index') }}"
method="get" 
autocomplete="false"
role="search">
    <div class="form-group d-flex align-items-center">
        <div class="input-group">
            <input type="text" 
            class="form-control border border-primary"
            name="searchText"
            placeholder="Buscar por Nombre o Num. comprobante..."
            value="{{ $searchText ?? '' }}"
            >
            <button type="submit">Buscar</button>
        </div>
    </div>
</form>