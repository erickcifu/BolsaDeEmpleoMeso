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
                 <a class="navbar-brand" href="{{ url('/') }}" style="color: #f0eadc;">
                   <b> {{ config('app.name', 'Bolsa de Empleo') }} <b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item">

                            <a href="{{ url('/carta-pdf') }}" class="nav-link" style="color: #f0eadc;"> ver carta</a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/empresasrrhh') }}" class="nav-link" style="color: #f0eadc;"> Empresasrrhh</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/empresas') }}" class="nav-link" style="color: #f0eadc;"> Empresas</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/municipios') }}" class="nav-link" style="color: #f0eadc;"> Municipios</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/departamentos') }}" class="nav-link" style="color: #f0eadc;"> Departamentos</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/cartarecomendacions') }}" class="nav-link" style="color: #f0eadc;"> Carta de Recomendacion</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/autoridadacademicas') }}" class="nav-link" style="color: #f0eadc;"> Autoridad Academicas</a> 

                            <a href="{{ url('/cvs') }}" class="nav-link" style="color: #f0eadc;"> Cvs</a> 
                        </li>

						<li class="nav-item">
                            <a href="{{ url('/estudiantes') }}" class="nav-link" style="color: #f0eadc;"> Estudiantes</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/carreras') }}" class="nav-link" style="color: #f0eadc;"> Carreras</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/facultads') }}" class="nav-link" style="color: #f0eadc;"> Facultads</a> 
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('/ofertasestudiantes') }}" class="nav-link" style="color: #f0eadc;">Estudiantes</a> 
                        </li> --}}
						<li class="nav-item">
                            <a href="{{ url('/entrevistas') }}" class="nav-link" style="color: #f0eadc;">Entrevistas</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/postulacions') }}" class="nav-link" style="color: #f0eadc;">Postulaciones</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/ofertas') }}" class="nav-link" style="color: #f0eadc;">Ofertas</a> 
                        </li>
                    </ul>
					@endauth()

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #f0eadc;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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