@csrf 
<input type="hidden" name="old_values" value="{{old('old_values')}}" id="old_values">
<select name="ocultoPrecios" id="ocultoPrecios" style="visibility:hidden">
    @foreach ($preciosArticulos as $precioArticulo)
    <option value="{{ $precioArticulo->idarticulo }}">{{$precioArticulo->precio_venta}}-{{$precioArticulo->stock}}</option>
    @endforeach
</select>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre del Cliente</label>
            <select name="idcliente" 
            id="idcliente" 
            class="form-control @error('idcliente') is-invalid @else border border-primary @enderror" " >
                <option value=""></option>
                @foreach ($personas as $persona)
                    @if ($persona->idpersona==old('idcliente') ||
                        $persona->idpersona == $idcliente)
                        <option value="{{$persona->idpersona}}" selected>{{$persona->nombre}}</option>
                    @else                       
                        <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                    @endif
                @endforeach
            </select>
        </div> 
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
            <label for="tipo_comprobante">Tipo de Comprobante</label>
            <select name="tipo_comprobante" 
            id="tipo_comprobante" 
            class="form-control  @error('tipo_comprobante') is-invalid @else border border-primary @enderror">
                <option value=""></option>
                <option value="Boleta" @if (old('tipo_comprobante')=="Boleta" || $ventas->tipo_comprobante == "Boleta") selected @endif>Boleta</option>
                <option value="Factura" @if (old('tipo_comprobante')=="Factura" || $ventas->tipo_comprobante == "Factura") selected @endif>Factura</option>
                <option value="Ticket" @if (old('tipo_comprobante')=="Ticket" || $ventas->tipo_comprobante == "Ticket") selected @endif>Ticket</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
            <label for="nombre">Serie del Comprobante</label>
                <input type="text" 
                name="serie_comprobante" 
                id="serie_comprobante"
                placeholder="Serie del Comprobante" 
                value="{{ old('serie_comprobante', $ventas->serie_comprobante) }}"
                class="form-control bg-light shadow-sm @error('serie_comprobante') is-invalid @else border border-primary @enderror"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                >
        </div> 
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
            <label for="nombre">Número del Comprobante</label>
                <input type="text" 
                name="num_comprobante" 
                id="num_comprobante"
                placeholder="Número del Comprobante" 
                value="{{ old('num_comprobante', $ventas->num_comprobante) }}"
                class="form-control bg-light shadow-sm @error('num_comprobante') is-invalid @else border border-primary @enderror"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"  
                >
        </div> 
    </div>
</div>
<div class="row py-4">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
            <label for="pidarticulo">Nombre del Artículo</label>
            <select name="pidarticulo" 
                id="pidarticulo" 
                class="form-control selectpicker border border-secondary" 
                data-live-search="true" 
                onchange="selecArticulo()"
                >
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
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
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
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
            <label for="pstock">Inventario</label>
                <input type="text" 
                name="pstock" 
                id="pstock"
                type="number"
                placeholder="Stock del Artículo" 
                class="form-control border border-secondary"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                disabled
                >
        </div> 
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-around my-0 pt-2">
            <label for="disVenta">Precio de Venta</label>
                <input type="text" 
                name="disVenta" 
                id="disVenta"
                placeholder="Precio del producto" 
                class="form-control border border-secondary"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                disabled
                >
        </div> 
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        <div class="form-group h-100 d-flex flex-column justify-content-between my-0 pt-2">
            <label for="pdescuento">Descuento</label>
            <input type="text" 
                name="pdescuento" 
                id="pdescuento"
                placeholder="Descuento del producto" 
                class="form-control border border-secondary"
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
            <thead class=" bg-info">
                <th class="w-10">id</th>
                <th class="w-19 text-center align-middle">Artículo</th>
                <th class="w-19 text-center align-middle">Cantidad</th>
                <th class="w-19 text-center align-middle">Precio Venta</th>
                <th class="w-19 text-center align-middle">Descuento</th>
                <th class="w-14 text-center align-middle">Total</th>
            </thead>
            <tfoot>
                <td class="w-10">Total</td>
                <td class="w-19 text-center align-middle"></td>
                <td class="w-19 text-center align-middle"></td>
                <td class="w-19 text-center align-middle"></td>
                <td class="w-19 text-center align-middle"></td>
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
                            <tdv><input type="number" name="cantidad[]" value="{{ old('cantidad')[$i] }}" class="form-control" id="h-cantidad-{{$i}}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></tdv>
                            <td class="w-19 text-center align-middle"><input type="number" name="precio_venta[]" value="{{ old('precio_venta')[$i] }}" class="form-control" id="h-precio_venta-{{$i}}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>
                            <td class="w-19 text-center align-middle"><input type="number" name="descuento[]" value="{{ old('descuento')[$i] }}" class="form-control" id="h-descuento-{{$i}}" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></td>
                            <td class="w-14 text-center align-middle">{{ old('cantidad')[$i]*old('precio_venta')[$i] }}</td>
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
    href="{{ route('ventas.index') }}">
        Cancelar
    </a>
</div>


