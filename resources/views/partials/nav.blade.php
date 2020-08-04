<?php
$user = Auth::user();   
?>
<nav class="navbar bg-white shadow-sm navbar-light navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('img/logo_3.svg')}}" alt="Inicio" style="max-width: 80px">
            <span>POS System</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills align-items-center">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ setActive('home') }}">
                        @lang("Home")
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mantenimiento') }}" class="nav-link {{ setActive('mantenimiento') }}">
                        Admin. Sistema
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ingresos.index') }}" class="nav-link {{ setActive('ingresos.*') }}">
                        Ingresos Almacén
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ventas.index') }}" class="nav-link {{ setActive('ventas.*') }}">
                        Ventas
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ setActive('login') }}">
                        Login
                        </a>
                    </li>
                @else 
                    <li class="nav-item">
                        <a href="#" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="text-right">
            <span>Usuario: </span>
            <span>
                @auth
                {{ $user->name }}
                @else
                Invitado
                @endauth
            </span>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}"  method="POST" style="display: none;">
    @csrf
</form>