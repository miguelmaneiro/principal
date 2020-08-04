@extends('layout')

@section('contenido')

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-9 col-md-10 col-sm-11 col-xs-12  mx-auto">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/paquete.svg') }}" 
                style="max-width: 60px" alt="Articulos"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Artículos</h4> 
            </div>
            <div class="form mt-3">
                @include('partials/validation-errors')
                <form 
                action="{{ route('articulos.update', $articulos) }}" 
                method="post"
                class="bg-white shadow rounded py-3 px-4"
                enctype="multipart/form-data"
                >
                    <div class="d-flex justify-content-between">
                        <h3 class="d-inline">Actualice los campos solicitados</h3>
                        <img src="{{asset('img/lapiz.svg')}}" alt="Editar" width="30px" class="d-inline">
                    </div> 
                    <hr>
                    <input type="hidden" name="idarticulo" value="{{$articulos->idarticulo}}">
                    <input type="hidden" name="imagen" value="{{$articulos->imagen}}">
                    @method('PATCH')
                    @include('almacen/articulos/_articulos-form', ['btnTxt'=>'Guardar'])
                </form>               
            </div>
        </div>
    </div>
</div>
    
@endsection