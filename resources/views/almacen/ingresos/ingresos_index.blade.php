@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/ing_almacen.svg') }}" 
                style="max-width: 60px" alt="Ingresos a almacén"
                class="d-inline"
                > 
                <h4 class="display-4 d-inline mb-0">Ingresos a almacén</h4> 
            </div>
            <a href="{{ route('ingresos.create') }}"
            class="btn btn-success">
                Nuevo
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            @include('almacen/ingresos/search_ingresos')
            <div class="table-responsive">
                <table 
                class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center">id</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Proveedor</th>
                        <th class="text-center">Comprobante</th>
                        <th class="text-center">Impuesto</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    @foreach ($ingresos as $ingreso)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $ingreso->idingreso}}
                            </td>
                            <td class="align-middle text-center">
                                {{ date('d-m-Y', strtotime($ingreso->fecha_hora)) }}
                            </td>
                            <td class="align-middle"> 
                                {{ $ingreso->personas->nombre}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $ingreso->tipo_comprobante.": ".$ingreso->serie_comprobante." - ".$ingreso->num_comprobante}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $ingreso->impuesto}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $ingreso->detalle_ingresos->sum('total_compra')}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $ingreso->estado}}
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('ingresos.show', $ingreso)}}"
                                class="d-inline">
                                    <img src="{{asset('img/detalles.svg')}}" alt="Editar" style="max-width: 25px"> 
                                </a>
                                <a href="#"
                                    data-target="#modal-delete-{{$ingreso->idingreso}}"
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