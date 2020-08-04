@extends('layout')

@section('contenido')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-10 col-md-11 mx-auto">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/ventas.svg') }}" 
                style="max-width: 60px" alt="Ingresos"
                class="d-inline"
                > 
                <h4 class="display-4 d-inline mb-0">Ventas</h4> 
            </div>
            <div class="form mt-3">
                @include('partials/validation-errors')
                <form 
                action="{{ route('ventas.store') }}" 
                method="post"
                class="bg-white shadow rounded py-3 px-4"
                enctype="multipart/form-data"
                >
                    <div class="d-flex justify-content-between">
                        <h3 class="d-inline">Complete los campos solicitados</h3>
                        <img src="{{asset('img/lapiz.svg')}}" alt="Editar" width="30px" class="d-inline">
                    </div> 
                    <hr>
                    @include('ventas/ventas/_ventas-form', ['btnTxt'=>'Guardar'])
                </form>               
            </div>
        </div>
        
    </div>
</div>
    
@endsection
