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
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    var  baseURL={!! json_encode(url('/')) !!}
    </script>

    <!-- Scripts -->
    
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #005c35;" >
            <div class="container">
                 <a class="navbar-brand" href="{{ url('ofertasestudiantes') }}" style="color: #f0eadc;">
                   <b> Regresar <b>
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
                            <a href="{{ url('/Misentrevistas') }}" class="nav-link" style="color: #f0eadc;">Listado de Entrevistas</a> 
                        </li> 

                           
                       
                    </ul>
					@endauth()

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>
      
        @vite(['public/js/agenda.js'])
        <main class="py-4">
            @yield('content')
        </main>
    </div>
   
</body>
</html>