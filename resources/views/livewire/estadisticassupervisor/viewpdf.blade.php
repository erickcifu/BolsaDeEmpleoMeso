@section('title', __('Estadisticas'))
<!doctype html>
<html>
    <head>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @livewireStyles
    </head>

    <style>
        body {
            font-family: "Montserrat", sans-serif !important;
            font-size: 14px;
            /* zoom: 75%; */
            /* padding: 0; */
            width: 205mm;
            /* Ancho del papel A4 en milímetros */
            height: 295mm;
            /* Altura del papel A4 en milímetros */
            /* margin: auto; */
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 15px;
            width: 100%;
            text-align: right;
            padding-right: 15px;
            
        }
        @page {
            margin-right: 0.1cm;
            margin-left: 0.1cm;
            margin-top: 0.1cm;
            margin-bottom: 0cm;
        }

        .row {
            width: 100%;
        }

        .col-12 {
            width: 100%;
        }

        .col-9 {
            width: 75%;
        }

        .col-8 {
            width: 66.67%;
        }

        .col-6 {
            width: 50%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-3 {
            width: 25%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-1 {
            width: 8.33%;
        }

        .h {
            height: 100%;
        }

        .title-card-home {
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            top: 75px;
            left: 35px;
            /* transform: translate(-50%, -50%); */
            z-index: 300;
            border: solid 5px #005c38;
            outline: solid 5px #99999b;
        }

        .contenedor {
            position: relative;
            width: 100%;
        }

        .contenedor hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 0;
        }

        .elemento-relativo {
            position: absolute;
            top: -11;
            left: 5;
            background-color: #fff;
            height: 10px;
            width: 30px;
            /* Estilos adicionales según tus necesidades */
        }

        .svg-clase {
            fill: #ff0000; /* Cambia a tu color deseado */
        }

        #mi-svg {
            fill: #00ff00; /* Cambia a tu color deseado */
        }

        svg {
            fill: #f3f4f7;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #99999b;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #99999b;
        }

        /* Para los totales */
        .row {
            display: inline-block;;
            width: 30%;
            margin-bottom: 2rem; 
            margin-left: 15px;
            padding: 1px;
            border-radius: 5px;
            vertical-align: top
        }

        .text-center {
            text-align: center;
        }

        .mb-1 {
            margin-bottom: 1rem; /* Ajusta según sea necesario */
        }

        .mb-2 {
            margin-bottom: 2rem; /* Ajusta según sea necesario */
        }

        .card {
            border: 2px solid #005c35; /* border-secondary color */
            padding: 0.5rem; /* Ajusta según sea necesario */
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            border-bottom: 2px solid #005c35; /* Línea divisoria */
            position: relative;
        }

        .card-header::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #6c757d; /* Color de la línea */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Efecto de sombra */
        }

        .mx-sm-1 {
            margin-left: 0.25rem;
            margin-right: 0.25rem;
        }

        .card-body {
            padding-top: 1rem; /* Espacio superior en el cuerpo */
        }

        .mt-3 {
            margin-top: 1rem; /* Ajusta según sea necesario */
        }

        .mt-2 {
            margin-top: 0.5rem; /* Ajusta según sea necesario */
        }
    </style>
    

    <body>
    <div style="display: flex; height: 2.5cm; ">
        <img src="{{ public_path($imageUrl) }}"  style="height: 100%; margin-left: 20px; margin-top: 20px;" alt="Logo">
        <div style="float: right; margin-top: 45; margin-right: 20px; text-align: right;">
            <h3 style="margin-bottom: 0;">Facultad de {{ $nombreFacultad }}</h3>
            <h3 style="margin-top: 0;">Universidad Mesoamericana</h3>
        </div>
        <div style="margin-left: 10px; margin-right: 10px; border-top: 1px solid #000; margin-top: 10px;"></div>
    </div>
    </br>
    </br>
    </br>
        <div>
        {{--tablass--}}   
        <!-- <h3  style="text-align: center;">Reporte de la Facultad de {{ $nombreFacultad }}</h3> -->
        <div class="card-body">
                <div class="table-responsive" style="margin: 15px;">
                    <table class="table table-bordered border-dark-subtle table-sm" width="100%">
                        <thead class="thead">
                            <tr> 
                                <th style="background-color: #005c35;"><b style="color: #f0eadc;">Habilidad técnica</th>
                                <th style="background-color: #005c35;"><b style="color: #f0eadc;">Cant. Veces requerida</th>
                        
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($habilidadesT as $habilidades)
                            <tr>
                            <td>{{ $habilidades->nombreTecnica }}</td>
                            <td>{{ $habilidades->total }}</td>
                            </tr>
                            @endforeach
                    
                        </tbody>
                    </table>	
                </div>
                
                </div> 
            </div>
        {{--fin tabla--}}  

        <div class="row mb-2">
        <div class="col-md-3 mb-1">
            <div class="card border-info mb-3 mx-sm-1 p-2">
            <div class="card-header text-center"><b>Total de habilidades técnicas</b></div>
                <div class="card-body">
                    <div class="text-secondary text-center">
                        <p> 
                            @foreach ($HabilidadesYear as $hab)
                                {{ $hab->total }}       
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
            <div class="card-header text-center"><b>Total de ofertas</b></div>
                <div class="card-body">
                    <div class="text-secondary text-center">
                        <p>
                        @foreach ($OfertasYear as $of)
                        {{ $of->total }}       
                        @endforeach 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="row mb-2">
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
            <div class="card-header text-center"><b>Total de postulaciones</b></div>
                <div class="card-body">
                    <div class="text-secondary text-center">
                        <p>
                        @foreach ($PostuladosYear as $pos)
                        {{ $pos->total }}       
                        @endforeach 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
            <div class="card-header text-center"><b>Total de contrataciones</b></div>
                <div class="card-body">
                    <div class="text-secondary text-center">
                        <p>
                        @foreach ($ContratadosYear as $contr)
                        {{ $contr->total }}       
                        @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NUEVO -->
    <div class="row mb-2">
        <div class="col-md-3 mb-1">
            <div class="card border-secondary mx-sm-1 p-2">
            <div class="card-header text-center"><b>Total de entrevistas realizadas</b></div>
                <div class="card-body">
                    <div class="text-secondary text-center">
                        <p>
                        @foreach ($ContratadosYear as $contr)
                        {{ $contr->total }}       
                        @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!-- <div class="row w-100 d-flex justify-content-center mb-2"
                style="border: 1px solid gray; padding: 3px; border-radius: 5px">
                <div class="text-center">Total Rechazados</div>
                <div class="col-md-3 mb-1">
                    @foreach ($RechazadosYear as $rech)
                    {{ $rech->total }}       
                    @endforeach   
            </div> -->
        </div>
        
        <!-- Footer -->
    <div class="footer">
    <br/>
        Reporte generado: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
    </div>
    </body>
    
</html>