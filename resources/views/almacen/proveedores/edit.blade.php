@extends('layout')

@section('contenido')

<div class="container mt-4">
    <div class="row"> 
        <div class="col-12  mx-auto">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/proveedores.svg') }}" 
                style="max-width: 60px" alt="Proveedores"
                class="d-inline"
                >
                <h4 class="display-4 d-inline mb-0">Proveedores</h4> 
            </div> 
            <div class="form mt-3">
                @include('partials/validation-errors')
                <form 
                action="{{ route('proveedores.update', $proveedor) }}" 
                method="post"
                class="bg-white shadow rounded py-3 px-4"
                >
                <div class="d-flex justify-content-between">
                    <h3 class="d-inline">Actualice los campos solicitados</h3>
                    <img src="{{asset('img/lapiz.svg')}}" alt="Editar" width="30px" class="d-inline">
                </div>  
                    <hr>
                    @method('PATCH')
                    @include('almacen/proveedores/_proveedores-form', ['btnTxt'=>'Guardar'])
                </form>               
            </div>
        </div>
        
    </div>
</div>
    
@endsection