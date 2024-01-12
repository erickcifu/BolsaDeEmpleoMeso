<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #005c35;" >
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}" style="color: #f0eadc;">
                    <img src="{{ asset('storage/Meso/LogoBlanco.png') }}" width="50px" />
                    <b> {{ config('app.name', 'Bolsa de Empleo') }} <b>
                    </a>
                    @if(Request::is('tutoriales'))
                    <div><a href="{{ url('/') }}" class="nav-link" style="color: #f0eadc;"><i class="fa-solid fa-house"></i> Página principal</a></div>  
                    @else
                    <div><a href="{{ url('tutoriales') }}" class="nav-link" style="color: #f0eadc;"><i class="fa-solid fa-circle-info"></i> Información</a></div>
                    @endif

                    
                @else
                
                <a class="navbar-brand" href="{{ url('/home') }}" style="color: #f0eadc;">
                <img src="{{ asset('storage/Meso/LogoBlanco.png') }}" width="50px" />
                    <b> {{ config('app.name', 'Bolsa de Empleo') }} <b>
                    </a>
                @endguest
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" style="color: #f0eadc;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Configuraciones generales
                            </a>
                                <ul class="dropdown-menu" style="background-color: #005c35;">
                                    
                                    <li class="nav-item">
                                        <a href="{{ url('/habilidadtecnicas') }}" class="nav-link" style="color: #f0eadc;">Habilidades técnicas </a> 
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="nav-item">
                                        <a href="{{ url('/Interpersonals') }}" class="nav-link" style="color: #f0eadc;">Habilidades interpersonales </a> 
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="nav-item">
                                        <a href="{{ url('/competencias') }}" class="nav-link" style="color: #f0eadc;">Competencias Comportamentales</a> 
                                    </li>                                    
                                </ul>
                        </li>
						<!--
						<li class="nav-item">
                            <a href="{{ url('/entrevistas') }}" class="nav-link" style="color: #f0eadc;">Entrevistas</a> 
                        </li>-->
						<!-- <li class="nav-item">
                            <a href="{{ url('/postulacions') }}" class="nav-link" style="color: #f0eadc;">Postulaciones</a> 
                        </li> -->
						<li class="nav-item">
                            <a href="{{ url('/ofertas') }}" class="nav-link" style="color: #f0eadc;">Ofertas</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/estadisticasempresa') }}" class="nav-link" style="color: #f0eadc;">Estadisticas</a> 
                        </li>
                    </ul>
					@endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre style="color: #f0eadc; display: flex; align-items: center;">
                                    <div style="width: 35px; height: 35px; background-color: #f0eadc; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                                        <span style="color: #111111; font-weight: bold; font-size: 14px;">
                                            @if (strlen(Auth::user()->name) >= 2)
                                                {{ strtoupper(substr(Auth::user()->name, 0, 1) ) }}
                                            @else
                                                {{ strtoupper(Auth::user()->name) }}
                                            @endif
                                        </span>
                                    </div>
                                {{-- {{ Auth::user()->name }} --}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    
                                    <div class="nav-item dropdown mt-3 "> 
                                        <b style="display: flex; align-items:right; padding-left: 1em; height: 25px;">{{ Auth::user()->name }}</b>
                                    </div>
                                        <br/>
                                    <div class="nav-item dropdown mt-3 card"style="background-color: #d3d3d3;display: flex; align-items: center;">    
                                            <a href="{{ url('/empresas') }}" class="nav-link">Perfil</a> 
                                    </div>
                                    <div class="nav-item dropdown mt-3 card"style="background-color: #d3d3d3;display: flex; align-items: center;">    
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </div>
                                    

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
    @livewireScripts
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
           addModal.hide();
           editModal.hide();
        })
    </script>
</body>
</html>