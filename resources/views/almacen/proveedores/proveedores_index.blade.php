@extends('layout')
@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/proveedores.svg') }}" 
                style="max-width: 60px" alt="Proveedores"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Proveedores</h4> 
            </div>
            <a href="{{ route('proveedores.create') }}"
            class="btn btn-success">
                Nuevo 
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12  mx-auto">
            @include('almacen/proveedores/search_proveedores')
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Tipo Documento</th>
                        <th class="text-center">Número de Documento</th>
                        <th class="text-center">Teléfono</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">&nbsp;&nbsp;Acción&nbsp;&nbsp;</th>
                    </thead>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="align-middle">
                                {{ $proveedor->nombre }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $proveedor->tipo_documento }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $proveedor->num_documento }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $proveedor->telefono }}
                            </td>
                            <td class="align-middle">
                                {{ $proveedor->email }}
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('proveedores.edit', $proveedor) }}"
                                class="d-inline">
                                    <img src="{{asset('img/lapiz2.svg')}}" alt="Editar" style="max-width: 25px">
                                </a>
                                <a href="#"
                                data-target="#modal-delete-{{$proveedor->idpersona}}"
                                data-toggle="modal"
                                >
                                    <img src="{{asset('img/borrar.svg')}}" alt="Eliminar" width="25px" >
                                </a>
                            </td>
                        </tr>
                        @include('almacen/proveedores/modal')
                    @endforeach
                </table>
            </div>
            {{ $proveedores->links() }}
        </div>
    </div>
</div>
@endsection