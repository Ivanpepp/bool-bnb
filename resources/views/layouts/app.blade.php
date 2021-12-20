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
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="my-wrap-homepage">
        <div class="div-height"></div>
        <div class="my-header">
            <div class="pos-f-t">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Bool<span class="my_blue">BNB</span>
                        </a>
                        <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars fa-lg p-2"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="mycollapse">
                            <ul class="navbar-nav ml-auto text-center">
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link toggler-link-2 text-light p-3" href="{{ route('guest.home') }}">
                                        <i class="fas fa-search fa-lg"></i>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light p-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-house-user fa-lg my_blue"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('login')}}">
                                            {{ __('Login') }}
                                        </a>
                                        @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{route('register')}}">
                                            {{ __('Registrati') }}
                                        </a>
                                    </div>
                                </li>
                                @endif
                                @else
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('guest.home') }}"><i class="fas fa-search fa-lg"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('host.mail.index') }}"><i class="far fa-envelope fa-lg"></i></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="user-nav nav-link dropdown-toggle my_blue" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="user-icon text-light">{{ Auth::user()->name }} |</span>
                                        <i class="fas fa-house-user fa-lg my_blue"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('host.home')}}">
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('host.apartments.index')}}">
                                            {{ __('Inserzioni') }}
                                        </a>
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
                        <div class="collapse my_hidden my_bg-black" id="navbarToggleExternalContent">
                            <div class="p-2 text-center">
                                @guest
                                <a class="text-light toggler-link" href="{{ route('guest.home') }}">
                                    <span class="h4">Esplora</span>
                                </a>
                                <div class="dropdown pt-3">
                                    <a id="navbarDropdownMenuLink" class="dropdown-toggle p-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="h4 my_blue">Profilo Utente</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{route('login')}}">
                                            {{ __('Login') }}
                                        </a>
                                        @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{route('register')}}">
                                            {{ __('Registrati') }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                                @else
                                <a class="text-light toggler-link" href="{{ route('guest.home') }}">
                                    <span class="h4">Esplora</span>
                                </a>
                                <br>
                                <a class="text-light toggler-link-2" href="{{ route('host.mail.index') }}">
                                    <span class="h4">Messaggi</span>
                                </a>
                                <br>
                                <a class="text-light toggler-link-3" href="{{ route('host.apartments.index') }}">
                                    <span class="h4">Annunci Personali</span>
                                </a>
                                <br>
                                <div class="dropdown pt-3">
                                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="h4">{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('host.home')}}">
                                            {{ __('Dashboard') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <main class="my-main-padding">
            @yield('content')
        </main>

        <!-- FOOTER APP -->
        <footer class="my-footer pt-5" id="my-footer-second">
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
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vue-braintree/dist/vue-braintree.umd.min.js"></script>
</body>
<script>
    const navbar = document.querySelector('.fixed-top');
    const hiddenNav = document.querySelector('.my_hidden');
    const toggler = document.querySelector('.fa-bars');
    const menuToggler = document.querySelector('#navbarToggleExternalContent');
    const linkToggler = document.querySelector('.toggler-link');
    const linkToggler2 = document.querySelector('.toggler-link-2');
    const linkToggler3 = document.querySelector('.toggler-link-3');
    const searchIcon = document.querySelector('.fa-search');
    const mailIcon = document.querySelector('.fa-envelope');
    const userIcon = document.querySelector('.user-icon');
    window.onscroll = () => {
        if (window.scrollY > 80 ) {
            navbar.classList.add('nav-active');
            navbar.classList.remove('navbar-dark');
            navbar.classList.add('navbar-light');
            hiddenNav.classList.remove('show');
            toggler.classList.add('my_blue');
            menuToggler.classList.remove('my_bg-black');
            menuToggler.classList.add('my_bg-white');
            linkToggler.classList.remove('text-light');
            linkToggler.classList.add('text-dark');
            linkToggler2.classList.remove('text-light');
            linkToggler2.classList.add('text-dark');
            linkToggler3.classList.remove('text-light');
            linkToggler3.classList.add('text-dark');
            searchIcon.classList.add('my_black-text');
            mailIcon.classList.add('my_black-text');
            userIcon.classList.add('my_black-text');
            userIcon.classList.remove('text-light');
        } else {
            navbar.classList.remove('nav-active');
            navbar.classList.add('navbar-dark');
            navbar.classList.remove('navbar-light');
            toggler.classList.remove('my_blue');
            menuToggler.classList.remove('my_bg-white');
            menuToggler.classList.add('my_bg-black');
            linkToggler.classList.remove('text-dark');
            linkToggler.classList.add('text-light');
            linkToggler2.classList.remove('text-dark');
            linkToggler2.classList.add('text-light');
            linkToggler3.classList.remove('text-dark');
            linkToggler3.classList.add('text-light');
            searchIcon.classList.remove('my_black-text');
            mailIcon.classList.remove('my_black-text');
            userIcon.classList.remove('my_black-text');
            userIcon.classList.add('text-light');
        }
    };

    window.onresize = () => {
        if (window.innerWidth >= 576) {
            hiddenNav.classList.remove('show')
        }
    };
</script>

</html>
