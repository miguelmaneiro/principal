@extends('layout')

@section('contenido')
<div class="container mt-4"> 
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/categorias.svg') }}" 
                style="max-width: 60px" alt="Categorias"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Categorías</h4> 
            </div>
            <a href="{{ route('categorias.create') }}"
            class="btn btn-success">
                Nueva
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            @include('almacen/categorias/search_categorias')
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center">id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">descripcion</th>
                        <th class="text-center">&nbsp;&nbsp;Acción&nbsp;&nbsp;</th>
                    </thead>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $categoria->idcategoria}}
                            </td>
                            <td class="align-middle">
                                {{ $categoria->nombre}}
                            </td>
                            <td class="align-middle">
                                {{ $categoria->descripcion}}
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('categorias.edit', $categoria) }}"
                                >
                                    <img src="{{asset('img/lapiz2.svg')}}" alt="Editar" style="max-width: 25px">
                                </a>
                                <a href="#"
                                    data-target="#modal-delete-{{$categoria->idcategoria}}"
                                    class="d-inline"
                                    data-toggle="modal"
                                    >
                                    <img src="{{asset('img/borrar.svg')}}" alt="Eliminar" width="25px" >
                                </a>
                            </td>
                        </tr>
                        @include('almacen/categorias/modal')
                    @endforeach
                </table>
            </div>
            {{ $categorias->links() }}
        </div>
    </div>
</div>
@endsection