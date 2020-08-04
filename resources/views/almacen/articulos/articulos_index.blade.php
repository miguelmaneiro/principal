@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between  mx-auto">
            <div class="w-100 d-flex align-items-center">
                <img src="{{ asset('img/paquete.svg') }}" 
                style="max-width: 60px" alt="Articulos"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Artículos</h4> 
            </div>
            <a href="{{ route('articulos.create') }}"
            class="btn btn-success">
                Nueva
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12  mx-auto">
            @include('almacen/articulos/search_articulos_2')
            @include('almacen/articulos/search_articulos')
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="bg-info">
                        <th class="text-center">id</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Código</th>
                        <th class="text-center">Categoría</th>
                        <th class="text-center">Inventario</th>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    @foreach ($articulos as $articulo)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $articulo->idarticulo}}
                            </td>
                            <td class="align-middle">
                                {{ $articulo->nombre}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $articulo->codigo}}
                            </td>
                            <td class="align-middle">
                                {{ $articulo->categoria->nombre}}
                            </td>
                            <td class="align-middle text-center">
                                {{ $articulo->stock}}
                            </td>
                            <td class="align-middle">
                                <img src="img/articulos/{{ $articulo->imagen}}" alt="" class="img-thumbnail" style="max-width: 120px"
                                >
                            </td>
                            <td class="align-middle text-center">
                                {{ $articulo->estado}}
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('articulos.edit', $articulo)}}"
                                class="d-inline">
                                <img src="{{asset('img/lapiz2.svg')}}" alt="Editar" style="max-width: 25px"> 
                                </a>
                                <a href="#"
                                    data-target="#modal-delete-{{$articulo->idarticulo}}"
                                    data-toggle="modal"
                                    >
                                    <img src="{{asset('img/borrar.svg')}}" alt="Eliminar" width="25px" >
                                </a>
                            </td>
                        </tr>
                        @include('almacen/articulos/modal')   
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection