@php
use Carbon\Carbon;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/brand/vitis-icono.ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('css')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="mb-5" id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container flex-nowrap">
                <a class="navbar-brand" href="{{ url('/web') }}">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                    <img src="{{ asset('img/brand/Vitis-negro.png') }}" class="img-fluid w-25 h-25" alt="Logo vitis">
                </a>
                <button class="navbar-toggler m-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('parcelas') }}">Parcelas</a>
                        </li>
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('propietarios') }}">Propietarios</a>
                        </li>
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('cultivos') }}">Cultivos</a>
                        </li>
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('trabajos') }}">Trabajos</a>
                        </li>
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('tipo-trabajos') }}">Tipos de trabajo</a>
                        </li>
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('municipios') }}">Municipios</a>
                        </li>
                        <li class="nav-item d-block">
                            <a class="nav-link" href="{{ route('provincias') }}">Provincias</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('js')
    <footer class="fixed-bottom bg-white text-grey text-center py-2">
        <div class="container">
            <p class="m-0">&copy; Vitis {{ Carbon::now()->format('Y') }} - AGarcia</p>
        </div>
    </footer>
</body>

</html>