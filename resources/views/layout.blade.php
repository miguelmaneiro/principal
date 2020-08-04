<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/funciones.js') }}"></script>
    <title>-PruebaVentas-</title>
</head>
<body>
    <div id="app" class="d-flex flex-column app-height justify-content-between">
        <header>
            @include('partials.nav')
            @include('partials/session-status')
        </header>
        <main class="h-100">
            
            @yield('contenido')
        </main>
        <div class="bg-white text-center text-black-50 py-3 shadow">
                {{ config('app.name')  }} | Copyright @ {{ date('Y') }}
        </div>
    </div>
</body>
<script src="{{ asset('js/funciones.js') }}"></script>
</html>