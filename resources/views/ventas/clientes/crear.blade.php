@extends('layout')

@section('contenido')

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-9 col-md-10 col-sm-11 col-xs-12 mx-auto">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/clientes.svg') }}" 
                style="max-width: 60px" alt="Clientes"
                class="d-inline"
                > 
                <h4 class="display-4 d-inline mb-0">Clientes</h4> 
            </div>
            <div class="form mt-3">
                @include('partials/validation-errors')
                <form 
                action="{{ route('clientes.store') }}"  
                method="post"
                class="bg-white shadow rounded py-3 px-4"
                >
                <div class="d-flex justify-content-between">
                    <h3 class="d-inline">Complete los campos solicitados</h3>
                    <img src="{{asset('img/lapiz.svg')}}" alt="Editar" width="30px" class="d-inline">
                </div> 
                    <hr>
                    @include('ventas/clientes/_clientes-form', ['btnTxt'=>'Guardar'])
                </form>               
            </div>
        </div>
        
    </div>
</div>
    
@endsection
