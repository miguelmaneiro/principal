@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/ing_almacen.svg') }}" 
                style="max-width: 60px" alt="Ingresos a almacén"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Ingresos a almacén</h4> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            <div class="table-responsive">
                <h5>Detalle del ingreso: {{$ingresos[0]->tipo_comprobante.": ".$ingresos[0]->serie_comprobante." - ".$ingresos[0]->num_comprobante}}</h5>
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
                                {{ date('d-m-Y', strtotime($ingresos[0]->fecha_hora)) }}
                            </td>
                            <td class="align-middle">
                                {{ $ingresos[0]->personas->nombre}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $ingresos[0]->tipo_comprobante.": ".$ingresos[0]->serie_comprobante." - ".$ingresos[0]->num_comprobante}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $ingresos[0]->impuesto}}
                            </td>
                            <td class="text-center align-middle">
                                {{-- $ingresos[0]->detalle_ingresos->sum('total_venta')--}}
                                {{ $ingresos[0]->detalle_ingresos->sum('total_compra') }}
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12  mx-auto">
            <div class="table-responsive">
                <h5>Artículos incluídos:</h5>
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center align-middle">Artículo</th>
                        <th class="text-center align-middle">Cantidad</th>
                        <th class="text-center align-middle">Precio de Compra</th>
                        <th class="text-center align-middle">Total</th>
                        <th class="text-center align-middle">Precio de Venta</th>
                    </thead>
                    @foreach ($ingresos[0]->detalle_ingresos2 as $detalle_ingreso)
                        <tr>
                            <td class="align-middle">
                                {{ $detalle_ingreso->articulos->nombre}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_ingreso->cantidad}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_ingreso->precio_compra}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_ingreso->cantidad*$detalle_ingreso->precio_compra}}
                            </td>
                            <td class="text-center align-middle">
                                {{ $detalle_ingreso->precio_venta }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>        
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <a href="{{ route('ingresos.index')}} " class="btn btn-sm btn-success"><img src="{{asset('img/volver.svg')}}" alt="Volver" width="30px"><span > Volver al índice</span></a>
        </div>
    </div>
</div>
@endsection