@extends('layout')

@section('contenido')

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-lg-9 col-md-10 col-sm-11 col-xs-12  mx-auto">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/categorias.svg') }}" 
                style="max-width: 60px" alt="Categorias"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Categorías</h4> 
            </div>
            <div class="form mt-3">
                @include('partials/validation-errors')
                <form 
                action="{{ route('categorias.update', $categorias) }}" 
                method="post"
                class="bg-white shadow rounded py-3 px-4"
                >
                    <div class="d-flex justify-content-between">
                        <h3 class="d-inline">Actualice los campos solicitados</h3>
                        <img src="{{asset('img/lapiz.svg')}}" alt="Editar" width="30px" class="d-inline">
                    </div> 
                    <hr>
                    @method('PATCH')
                    @include('almacen/categorias/_categorias-form', ['btnTxt'=>'Guardar'])
                </form>               
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-10 col-sm-11 col-xs-12 mx-auto table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <h4>Artículos asociados a la categoría seleccionada</h4>
                <thead class="bg-info">
                    <th class="text center">id</th>
                    <th class="text center">Nombre</th>
                    <th class="text center">Código</th>
                    <th class="text center">Descripcion</th>
                    <th class="text center">Inventario</th>
                </thead>
                @foreach ($categorias->articulos as $articulo)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $articulo->idarticulo }}
                        </td>
                        <td class="align-middle">
                            {{ $articulo->nombre }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $articulo->codigo }}
                        </td>
                        <td class="align-middle">
                            {{ $articulo->descripcion }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $articulo->stock }}
                        </td>
                    </tr>
                @endforeach
            </table>            
        </div>
        
    </div>

</div>
    
@endsection