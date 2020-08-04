@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/ventas.svg') }}" 
                style="max-width: 60px" alt="Ventas"
                class="d-inline" 
                >
                <h4 class="display-4 d-inline mb-0">Ventas</h4> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            <div class="table-responsive">
                <h5>Detalle de la venta: {{$ventas[0]->tipo_comprobante.": ".$ventas[0]->serie_comprobante." - ".$ventas[0]->num_comprobante}}</h5>
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center align-middle">Fecha</th>
                        <th class="text-center align-middle">Proveedor</th>
                        <th class="text-center align-middle">Comprobante</th>
                        <th class="text-center align-middle">Impuesto</th>
                        <th class="text-center align-middle">Total</th>
                    </thead>
                        <tr>
                            <td class="text-center align-middle">
                                {{ date('d-m-Y', strtotime($ventas[0]->fecha_hora)) }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $ventas[0]->personas->nombre}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $ventas[0]->tipo_comprobante.": ".$ventas[0]->serie_comprobante." - ".$ventas[0]->num_comprobante}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $ventas[0]->impuesto}}
                            </td>
                            <td class="text-center align-middle">
                                {{-- $ventas[0]->detalle_ventas->sum('total_venta')--}}
                                {{ $ventas[0]->detalle_ventas->sum('total_venta') }}
                            </td>
                        </tr>
                </table>
            </div>        
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12  mx-auto">
            <div class="table-responsive">
                <h4>Artículos vendidos</h4>
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center align-middle">Artículo</th>
                        <th class="text-center align-middle">Cantidad</th>
                        <th class="text-center align-middle">Precio de Compra</th>
                        <th class="text-center align-middle">Descuento</th>
                        <th class="text-center align-middle">Total</th>
                    </thead>
                    @foreach ($ventas[0]->detalle_ventas2 as $detalle_venta)
                        <tr>
                            <td class="align-middle">
                                {{ $detalle_venta->articulos->nombre}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_venta->cantidad}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_venta->precio_venta}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_venta->descuento }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_venta->cantidad*$detalle_venta->precio_venta }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>        
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <a href="{{ route('ventas.index')}} " class="btn btn-sm btn-success"><img src="{{asset('img/volver.svg')}}" alt="Volver" width="30px"><span > Volver al índice</span></a>
        </div>
    </div>
</div> 
@endsection