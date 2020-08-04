@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/ventas.svg') }}" 
                style="max-width: 60px" alt="Ventas"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Ventas</h4> 
            </div>
            <a href="{{ route('ventas.create') }}"
            class="btn btn-success">
                Nuevo
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            @include('ventas/ventas/search_ventas')
            <div class="table-responsive">
                <table 
                class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center">id</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Cliente</th>
                        <th class="text-center">Comprobante</th>
                        <th class="text-center">Impuesto</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $venta->idventa}}
                            </td>
                            <td class="align-middle text-center">
                                {{ date('d-m-Y', strtotime($venta->fecha_hora)) }}
                            </td>
                            <td class="align-middle"> 
                                {{ $venta->personas->nombre}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $venta->tipo_comprobante.": ".$venta->serie_comprobante." - ".$venta->num_comprobante}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $venta->impuesto}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $venta->detalle_ventas->sum('total_venta')}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $venta->estado}}
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('ventas.show', $venta)}}"
                                class="d-inline">
                                    <img src="{{asset('img/detalles.svg')}}" alt="Editar" style="max-width: 25px">  
                                </a>
                                <a href="#"
                                    data-target="#modal-delete-{{$venta->idventa}}"
                                    data-toggle="modal"
                                    >
                                    <img src="{{asset('img/borrar.svg')}}" alt="Eliminar" width="25px" >
                                </a>
                            </td>
                        </tr>
                        {{-- @include('almacen/articulos/modal')    --}}
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection