@csrf 
<input type="hidden" name="old_values" value="{{old('old_values')}}" id="old_values">
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre del Proveedor</label>
            <select name="idproveedor" 
            id="idproveedor" 
            class="form-control @error('idproveedor') is-invalid @else border border-primary @enderror" " >
                <option value=""></option>
                @foreach ($personas as $persona)
                    @if ($persona->idpersona==old('idproveedor') ||
                        $persona->idpersona == $idproveedor)
                        <option value="{{$persona->idpersona}}" selected>{{$persona->nombre}}</option>
                    @else                       
                        <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div> 
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="tipo_comprobante">Tipo de Comprobante</label>
            <select name="tipo_comprobante" 
            id="tipo_comprobante" 
            class="form-control  @error('tipo_comprobante') is-invalid @else border border-primary @enderror">
                <option value=""></option>
                <option value="Boleta" @if (old('tipo_comprobante')=="Boleta" || $ingresos->tipo_comprobante == "Boleta") selected @endif>Boleta</option>
                <option value="Factura" @if (old('tipo_comprobante')=="Factura" || $ingresos->tipo_comprobante == "Factura") selected @endif>Factura</option>
                <option value="Ticket" @if (old('tipo_comprobante')=="Ticket" || $ingresos->tipo_comprobante == "Ticket") selected @endif>Ticket</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="nombre">Serie del Comprobante</label>
                <input type="text" 
                name="serie_comprobante" 
                id="serie_comprobante"
                placeholder="Serie del Comprobante" 
                value="{{ old('serie_comprobante', $ingresos->serie_comprobante) }}"
                class="form-control bg-light shadow-sm @error('serie_comprobante') is-invalid @else border border-primary @enderror"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                >
        </div> 
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="nombre">Número del Comprobante</label>
                <input type="text" 
                name="num_comprobante" 
                id="num_comprobante"
                placeholder="Número del Comprobante" 
                value="{{ old('num_comprobante', $ingresos->num_comprobante) }}"
                class="form-control bg-light shadow-sm @error('num_comprobante') is-invalid @else border border-primary @enderror"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"  
                >
        </div> 
    </div>
</div>
<div class="row py-4">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="pidarticulo">Nombre del Artículo</label>
            <select name="pidarticulo" id="pidarticulo" class="form-control selectpicker border border-secondary" data-live-search="true" >
                <option value=""></option>
                @foreach ($articulos as $articulo)
                    @if ($articulo->idarticulo==old('idarticulo') ||
                        $articulo->idarticulo == $idarticulo)
                        <option value="{{$articulo->idarticulo}}" selected>{{$articulo->articulo}}</option>
                    @else                       
                        <option value="{{$articulo->idarticulo}}">{{$articulo->articulo}}</option>
                    @endif
                @endforeach
            </select>
        </div> 
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="pcantidad">Cantidad</label>
                <input type="text" 
                name="pcantidad" 
                id="pcantidad"
                type="number"
                placeholder="Cantidad de Artículos" 
                class="form-control border border-secondary"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                >
        </div> 
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="pcompra">Precio de Compra</label>
                <input type="text" 
                name="pcompra" 
                id="pcompra"
                type="number"
                placeholder="Precio de compra"
                class="form-control border-secondary"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" 
                >
        </div> 
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between mb-0 pt-2">
            <label for="pventa">Precio de Venta</label>
                <input type="text" 
                name="pventa" 
                id="pventa"
                placeholder="Serie del Comprobante" 
                class="form-control border-secondary"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                >
        </div> 
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="button" id="btn-agregar" class="btn btn-danger" onclick="agregar()">Agregar</button>
    </div>
</div>

<div class="row py-4">
    <div class="table-responsive mx-auto col-12">
        <table id="detalles" class="table table-bordered table-hover mx-auto">
            <thead class="bg-info">
                <th class="w-10 text-center align-middle">id</th>
                <th class="w-19 text-center align-middle">Artículo</th>
                <th class="w-19 text-center align-middle">Cantidad</th>
                <th class="w-19 text-center align-middle">Precio Compra</th>
                <th class="w-19 text-center align-middle">Precio Venta&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th class="w-14 text-center align-middle">Total</th>
            </thead>
            <tfoot>
                <td class="w-10 text-center align-middle">Total</td>
                <td class="w-19"></td>
                <td class="w-19"></td>
                <td class="w-19"></td>
                <td class="w-19"></td>
                <td class="w-14 text-center align-middle"><b id="total">$ 0.00</b></td>
            </tfoot>
            <tbody>        
                @if (old('idarticulo'))
                    @for ($i = 0; $i < count(old('idarticulo')); $i++)
                        <?php $busc =  old('idarticulo')[$i];
                                $temp = $articulos->find($busc);
                                $nombre = $temp->articulo;
                        ?>
                        <tr id="fila-{{$i}}">
                            <td class="w-10 text-center align-middle"><button type="button" class="btn btn-warning" id="btn-{{$i}}" onClick="eliminar({{$i}});">x</button></td>
                            <td class="w-19 text-center align-middle"><input type="hidden" name="idarticulo[]" value="{{ old('idarticulo')[$i] }}" id="h-idarticulo-{{$i}}">{{$nombre}}</td>
                            <td class="w-19 text-center align-middle"><input type="number" name="cantidad[]" value="{{ old('cantidad')[$i] }}" class="form-control" id="h-cantidad-{{$i}}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>
                            <td class="w-19 text-center align-middle"><input type="number" name="precio_compra[]" value="{{ old('precio_compra')[$i] }}" class="form-control" id="h-precio_compra-{{$i}}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>
                            <td class="w-19 text-center align-middle"><input type="number" name="precio_venta[]" value="{{ old('precio_venta')[$i] }}" class="form-control" id="h-precio_venta-{{$i}}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>
                            <td class="w-14 text-center align-middle">{{ old('cantidad')[$i]*old('precio_compra')[$i] }}</td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
    </div>
</div> 


<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
    <button class="btn btn-primary btn-md">
        {{ $btnTxt }}
    </button> 
    <a class="btn btn-outline-danger btn-md" 
    href="{{ route('categorias.index') }}">
        Cancelar
    </a>
</div>


