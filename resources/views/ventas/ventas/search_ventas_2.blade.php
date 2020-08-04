<form action="{{ route('ventas.index') }}"
method="get" 
autocomplete="false"
role="search">
    <div class="form-group align-items-center">
        <div class="input-group">
            <input type="text" 
            class="form-control"
            name="searchText2"
            placeholder="Buscar por Nombre..."
            value="{{ $searchText2 ?? '' }}" 
            >
            <span class="input-group-btn">
                <button type="submit">Buscar</button>
            </span>
        </div>
    </div>
</form>