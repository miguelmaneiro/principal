@extends('layout')

@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto text-center">
            <h2 class="text-center">Manejo del Almacén</h2>
            <img class="img-fluid d-block mx-auto" src="img/carretilla.svg" alt="">   
            <a href="{{ route('categorias.index') }}"
            class="btn btn-primary btn-lg"
            >
                Categorias
            </a>
            <a href="{{ route('articulos.index') }}"
            class="btn btn-danger btn-lg"
            >
                Articulos
            </a>
            <a href="{{ route('clientes.index') }}"
            class="btn btn-success btn-lg"
            >
                Clientes
            </a>
            <a href="{{ route('proveedores.index') }}"
            class="btn btn-secondary btn-lg"
            >
                Proveedores
            </a>
        </div>
    </div>
</div>
@endsection