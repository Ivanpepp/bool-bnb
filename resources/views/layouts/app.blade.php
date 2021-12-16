<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script> 
    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link  rel='stylesheet'  type='text/css'  href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="my-wrap-homepage">
        <div class="my-header">
            <nav class="navbar navbar-expand-md fixed-top navbar-dark" style="background-color: #131313" >
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Bool<span class="my-text-blue">BNB</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                        </ul>

                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('guest.home') }}"><i class="fas fa-search fa-lg"></i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-house-user fa-lg"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('login')}}">  
                                            {{ __('Login') }}
                                        </a>
                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{route('register')}}">  
                                            {{ __('Register') }}
                                        </a>
                                    </div>
                                </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('guest.home') }}">    <i class="fas fa-search fa-lg"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('host.mail.index') }}"><i class="far fa-envelope fa-lg"></i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="user-nav nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} |  
                                        <i class="fas fa-house-user fa-lg"></i>
                                    </a>

    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('host.home')}}">  
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('host.apartments.index')}}">
                                            {{ __('Apartments') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
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
        </div>

        <main >
        <main class="pb-5">
            @yield('content')
        </main>

        <!-- FOOTER APP -->
        <footer class="my-footer pt-5">
            <div class="container-fluid">
                <div class="row d-flex flex-row">
                    <div class="col-sm-6 col-lg-3">
                        <ul>
                            <li>
                                <h4>Assistenza</h4>
                            </li>
                            <li>
                                <a href="">Centro Assistenza</a>
                            </li>
                            <li>
                                <a href="">Informazioni di sicurezza</a>
                            </li>
                            <li>
                                <a href="">Opzioni di cancellazione</a>
                            </li>
                            <li>
                                <a href="">Segnala problemi nel quartiere</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <ul>
                            <li>
                                <h4>Informazioni</h4>
                            </li>
                            <li>
                                <a href="">Newsroom</a>
                            </li>
                            <li>
                                <a href="">Scopri le nuove funzionalità</a>
                            </li>
                            <li>
                                <a href="">Lettera dai nostri fondatori</a>
                            </li>
                            <li>
                                <a href="">Opportunità di lavoro</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <ul>
                            <li>
                                <h4>Ospitare</h4>
                            </li>
                            <li>
                                <a href="">Prova a ospitare</a>
                            </li>
                            <li>
                                <a href="">IAirCover: host protetti</a>
                            </li>
                            <li>
                                <a href="">Esplora le risorse per host</a>
                            </li>
                            <li>
                                <a href="">Vai al forum della community</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <ul>
                            <li>
                                <h4>Informazioni</h4>
                            </li>
                            <li>
                                <a href="">Newsroom</a>
                            </li>
                            <li>
                                <a href="">Scopri le nuove funzionalità</a>
                            </li>
                            <li>
                                <a href="">Lettera dai nostri fondatori</a>
                            </li>
                            <li>
                                <a href="">Opportunità di lavoro</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        
    </div>
</body>
<script>
</script>
</html>
