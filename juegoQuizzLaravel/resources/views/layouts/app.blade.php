<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')

    </title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">



    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('/img/icono.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/layouts.css')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2ed105d6e3.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark  shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img style="width:50px;" src="/img/icono.png" alt="icono-juego-economia">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            @if (auth()->check() && auth()->id() && Auth::user()->admin==1)
                            <a class="nav-link" href="/juegos/create">Crear Juego</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('juegos')}}">{{__('Juegos')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faqs')}}">{{__('FAQs')}}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto')}}">{{__('Contacto')}}</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('top_ten')}}">{{__('Ranking')}}</a>
                        </li>


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <form class="form-inline" action="/buscador" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control mt-2 mr-2" name="buscador" id="buscador" placeholder="Buscar Juego">
                                    <!-- <button class="btn btn-primary my-2" type="submit">Buscar</button> -->
                                </div>
                            </form>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item my-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item my-2">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                        @endif
                        @else
                        <div class="row mx-1 mb-2">

                            <li class="nav-item mt-2">
                                <img src="/storage/images/{{Auth::user()->image_profile}}" class="image_profile" alt="">
                            </li>

                            <li class="nav-item dropdown mt-2 ml-1">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{route('profile')}}" class="dropdown-item">
                                        <i class="fas fa-id-badge"></i> {{__('Perfil')}}
                                    </a>
                                    @if (auth()->check() && auth()->id() && Auth::user()->admin==1)
                                    <a class="dropdown-item" href="/admin">
                                        <i class="fas fa-user-lock"></i> {{__('Admin')}}
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4">
            <div class="container">

                @yield('content')

            </div>


        </main>


    </div>
    @yield('footer')
</body>

</html>
