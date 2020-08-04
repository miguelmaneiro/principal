@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/clientes.svg') }}" 
                style="max-width: 60px" alt="Clientes"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Clientes</h4> 
            </div>
            <a href="{{ route('clientes.create') }}"
            class="btn btn-success">
                Nueva
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            @include('ventas/clientes/search_clientes')
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
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td class="align-middle">
                                {{ $cliente->nombre }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $cliente->tipo_documento }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $cliente->num_documento }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $cliente->telefono }}
                            </td>
                            <td class="align-middle">
                                {{ $cliente->email }}
                            </td>
                            <td class="align-middle text-center">
                                <a href="{{ route('clientes.edit', $cliente) }}"
                                class="d-inline">
                                    <img src="{{asset('img/lapiz2.svg')}}" alt="Editar" style="max-width: 25px">
                                </a>
                                <a href="#"
                                data-target="#modal-delete-{{$cliente->idpersona}}"
                                data-toggle="modal">
                                    <img src="{{asset('img/borrar.svg')}}" alt="Eliminar" width="25px" >
                                </a>
                            </td>
                        </tr>
                        @include('ventas/clientes/modal')
                    @endforeach
                </table>
            </div>
            {{ $clientes->links() }}
        </div>
    </div>
</div>
@endsection