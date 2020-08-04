@csrf 
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre del Cliente</label>
                <input type="text" 
                name="nombre" 
                id="nombre"
                placeholder="Nombre del Cliente" 
                value="{{ old('nombre', $cliente->nombre) }}"
                class="form-control bg-light shadow-sm @error('nombre') is-invalid @else border border-primary @enderror" 
                >
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="tipo_documento">Tipo de Identificación</label>
            <select 
            name="tipo_documento" 
            id="tipo_documento" 
            class="form-control bg-light shadow-sm @error('tipo_documento') is-invalid @else border border-primary @enderror" 
            >
                <option value=""></option>
                <option value="Carnet" 
                    @if (old('tipo_documento')=='Carnet' || $cliente->tipo_documento == 'Carnet')
                        selected
                    @endif
                >
                    Carnet
                </option>
                <option value="Pasaporte"
                    @if (old('tipo_documento')=='Pasaporte' || $cliente->tipo_documento == 'Pasaporte')
                        selected
                    @endif
                >
                    Pasaporte
                </option>
                <option value="Otro"
                    @if (old('tipo_documento')=='Otro' || $cliente->tipo_documento == 'Otro')
                        selected
                    @endif
                >
                    Otro
                </option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="num_documento">Número de Documento</label>
                <input type="text" 
                name="num_documento" 
                id="num_documento"
                placeholder="Número de identificación" 
                value="{{ old('num_documento', $cliente->num_documento) }}"
                class="form-control bg-light shadow-sm @error('num_documento') is-invalid @else border border-primary @enderror" 
                >
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea name="direccion" 
            id="direccion"
            cols="30" rows="3" 
            placeholder="Coloque una dirección"
            class="form-control bg-light shadow-sm @error('direccion') is-invalid @else border border-primary @enderror" 
            >{{old(trim('direccion'), trim($cliente->direccion)) }}</textarea> 
        </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="descipcion">Teléfono</label>
            <input type="text" 
            name="telefono" 
            id="telefono"
            placeholder="Coloque un telefono" 
            value="{{ old('telefono', $cliente->telefono) }}"
            class="form-control bg-light shadow-sm @error('telefono') is-invalid @else border border-primary @enderror" 
            >
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="email"> Email</label>
            <input type="text" 
            name="email" 
            id="email"
            placeholder="Coloque un email" 
            value="{{ old('email', $cliente->email) }}"
            class="form-control bg-light shadow-sm @error('email') is-invalid @else border border-primary @enderror" 
            >
        </div> 
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button class="btn btn-primary btn-md">
            {{ $btnTxt }}
        </button> 
        <a class="btn btn-outline-danger btn-md" 
        href="{{ route('clientes.index') }}">
            Cancelar
        </a>
    </div>
</div>





