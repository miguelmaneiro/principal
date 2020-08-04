@extends('layout')

@section('tittle', 'HOME')

@section('contenido') 
   <div class="container h-100 w-100" style="background-image: url({{asset('img/fondo.svg')}});  background-repeat: no-repeat; background-position: center; background-size: cover">
      <div class="row h-100 d-flex justify-content-center">
         <div class="col-12 align-self-center text-center" style="padding-top:140px">
            <h1><strong class="text-primary">P</strong>oint <strong class="text-primary">o</strong>f <strong class="text-primary">S</strong>ale System</h1>
            <a href="{{ route('ventas.index') }}"
            class="btn btn-primary btn-lg"
            >
                Nueva venta
            </a>
            <a href="{{ route('ingresos.index') }}"
            class="btn btn-success btn-lg"
            >
                Ing al Almacén
            </a><br><br>
            <a href="{{ route('mantenimiento') }}"
            class="btn btn-danger btn-lg"
            >
                Administrar
            </a>
         </div>
      </div>
   </div>
@endsection
