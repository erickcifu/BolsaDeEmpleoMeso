<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('layouts.app')
@section('title', __('Welcome'))
@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        background: url('{{ asset('storage/Meso/Meso.png') }}') no-repeat center center fixed;
        background-size: cover;
    }

    @media (max-width: 768px) {
        body {
            background-attachment: scroll;
        }
    }
</style>
<body background="{{ asset('storage/Meso/Meso.png') }}">

    @if (Session::has('message'))
    <div id="message" class="alert alert-danger">
        {{ Session::get('message') }}
        <i class="fa fa-check-circle" aria-hidden="true"></i>
    </div>
    @endif

    <div class="container">
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="infoModalLabel"  style="color: #f0eadc;">Información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f0eadc;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí se llenará la información -->
                <p id="modalContent">Para acceder a los detalles de la oferta, inicia sesión o registrate desde el botón "Estudiantes" y selecciona tu correo electrónico institucional @umes.edu.gt ó @mesoamericana.edu.gt</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #005c35;">Cerrar</button>
            </div>
        </div>
    </div>
</div>


        <div class="row">
            @foreach ($grupos as $facultad=> $facultades)
            <div class="col-sm-12 col-md-4 px-2">
                <div id="carouselInd{{$loop->iteration}}" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($facultades as $row)
                        <li
                            data-target="#carouselInd{{$loop->iteration}}"
                            data-slide-to="{{$loop->iteration}}"
                            class="@if($loop->index ===0) active @endif"
                        ></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($facultades as $row)
                        <div
                            class="zoom carousel-item @if($loop->index===0) active @endif"
                            data-toggle="modal"
                            data-target="#infoModal"
                            data-info="Para conocer más información sobre la oferta: {{ $row->puesto }}, debe iniciar sesión o registrarse, desde el botón 'Estudiantes' "
                        >
                        <div
                            class="zoom carousel-item @if($loop->index===0) active @endif"
                        >
                            <div class="title-card-home">
                                <p class="text-center display-7" style="color: #f0eadc">
                                    {{ $facultad }}
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img
                                    class="d-block w-75"
                                    src="{{
                                        asset('storage/Meso/ofertasMeso.png')
                                    }}"
                                    alt="{{$row->puesto}}"
                                    style="filter: opacity(0.6)"
                                />
                            </div>
                            <div
                                class="carousel-caption d-none d-md-block"
                                style="color: #f0eadc"
                            >
                                <h5>
                                    <strong> {{$row->puesto}}</strong>
                                </h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a
                        class="carousel-control-prev"
                        href="#carouselInd{{$loop->iteration}}"
                        role="button"
                        data-slide="prev"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a
                        class="carousel-control-next"
                        href="#carouselInd{{$loop->iteration}}"
                        role="button"
                        data-slide="next"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div> 

        <!-- Carrusel -->

        <!-- Fin Carrusel -->

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 mt-2">
                    <div class="card" style="background-color: hsla(0, 0%, 0%, 0)">
                        <div class="card-body d-flex justify-content-center">
                            <button class="btn btn-success mr-3">
                                <a class="nav-link" href="{{ route('login-google') }}">{{ __("LoginStudents") }}</a>
                            </button>
                            <button class="btn btn-success">
                                <a class="nav-link" href="{{ route('login') }}">{{ __("LoginBussines") }}</a>
                            </button>
                            <br>
                            <br>
                        </div>
                        <br>
                    </div>
                    <br>
                </div>
                <br>
            </div>
            <br>
        </div>
        @endsection

        {{-- <nav
            class="navbar fixed-bottom navbar-light bg-light px-5 d-flex justify-content-around"
            style="background-color: #005c35 !important"
        >
            @foreach ($logos as $logo)
            <img
                class="w-5"
                src="{{ Storage::url('logos/'. $logo) }}"
                height="90"
                alt="Ejemplo"
            />
            @endforeach
        </nav> --}}
        <footer class="footer">
            <nav class="navbar navbar-light bg-light px-5 d-flex justify-content-around" style="background-color: #005c35 !important">
                @foreach ($logos as $logo)
                <img class="w-5" src="{{ Storage::url('logos/'. $logo) }}" height="75" alt="Ejemplo" />
                @endforeach
            </nav>
        </footer>
        
        <style>
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 75px; /* Ajusta la altura según sea necesario */
                background-color: #f5f5f5;
            }
        </style>
        
        
        
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"
        ></script>
    </div>
</body>
<script>
    setTimeout(function () {
        var message = document.getElementById("message");
        if (message) {
            message.style.display = "none";
        }
    }, 5000);

    $('#infoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Elemento que disparó el modal
        var info = button.data('info'); // Extrae la información de los atributos data-*
        var modal = $(this);
        modal.find('.modal-body #modalContent').text(info);
    });
</script>



