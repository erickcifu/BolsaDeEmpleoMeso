<!-- <!DOCTYPE html>
<html>
    <head>
        <title>{{ $titulo }}</title>
    </head>
    <body>
        <h1>{{ $titulo }}</h1>
        <h6>RESUMEN PROFESIONAL</h6>
        <p>{{ $perfilProfesional }}</p>
        <h6>HISTORIAL LABORAL</h6>
        @forelse($experiencias as $experiencia)
        <p>{{ $experiencia->puestoTrabajo }}</p>
        @empty
        <p>Sin experiencia laboral</p>
        @endforelse
        <h6>FORMACIÓN</h6>
        @forelse($formacions as $formacion)
        <p>{{ $formacion->institucionFormacion }}</p>
        @empty
        <p>Sin Formación Educativa</p>
        @endforelse
    </body>
</html> -->

<html>
    <head>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
        </style>
    </head>

    <style>
        body {
            font-family: "Montserrat", sans-serif !important;
            font-size: 14px;
            /* zoom: 75%; */
            padding: 0;
            width: 205mm;
            /* Ancho del papel A4 en milímetros */
            height: 295mm;
            /* Altura del papel A4 en milímetros */
            /* margin: auto; */
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
    </style>
    <body>
        <div
            class="row h"
            style="
                display: flex;
                justify-content: start;
                flex-direction: unset;
                align-items: center;
            "
        >
            <div class="col-4 h" style="float: left">
                <div
                    style="
                        background-color: #005c38;
                        height: 15%;
                        position: relative;
                    "
                >
                    <div class="title-card-home">
                        <img
                            src="{{ $imagen }}"
                            alt="perfil"
                            style="
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                border-radius: 50%;
                            "
                        />
                    </div>
                </div>
                <div style="background-color: #99999b; height: 85%">
                    <div style="padding-top: 125px; color: #fff">
                        <div style="padding: 8px">
                            <img
                                class="svg-clase"
                                src="{{ $map }}"
                                alt="mobile"
                                height="15"
                            />
                            {{ $departamento->nombreDepartamento }},
                            {{ $municipio->nombreMunicipio }},
                            {{ $direcionDomiciliar }}.
                            <br />
                            <img
                                class="svg-clase"
                                src="{{ $mobile }}"
                                alt="mobile"
                                height="15"
                            />
                            {{  $estudiante->numero_personal }}
                            <br />
                            <img src="{{ $email }}" alt="email" height="15" />
                            {{ $correo }}
                        </div>
                    </div>

                    <hr
                        style="
                            width: 95%;
                            background-color: #fff;
                            border: none;
                            height: 5px;
                        "
                    />
                    <div class="contenedor">
                        <div class="elemento-relativo"></div>
                    </div>

                    <div style="color: #fff; padding: 8px">
                        HABILIDADES
                        <ul>
                            <li>{{ $habilidades }}</li>
                        </ul>
                    </div>
                    <hr
                        style="
                            width: 95%;
                            background-color: #fff;
                            border: none;
                            height: 5px;
                        "
                    />
                    <div class="contenedor">
                        <div class="elemento-relativo"></div>
                    </div>
                    <div style="color: #fff; padding: 8px">
                        FORMACIÓN COMPLEMENTARIA
                        <br />
                        <br />
                        @forelse($certificaciones as $certificacion)
                        {{ $certificacion->nombreCertificacion }}
                        <br />
                        {{ $certificacion->institucionCertificadora }}
                        <br />
                        <strong>
                            {{date('Y', strtotime($certificacion->anioCertificacion))}}
                        </strong>
                        <br />
                        <br />
                        @empty
                        <p>Sin Certificaciones</p>
                        @endforelse
                    </div>
                    <hr
                        style="
                            width: 95%;
                            background-color: #fff;
                            border: none;
                            height: 5px;
                        "
                    />
                    <div class="contenedor">
                        <div class="elemento-relativo"></div>
                    </div>
                    <div style="color: #fff; padding: 8px">
                        IDIOMAS
                        <br />
                        <br />
                        @forelse($idiomas as $idioma)
                        <ul>
                            <li>
                                {{ $idioma->nombreIdioma }} -
                                {{ $idioma->nivelIdioma }}
                            </li>
                        </ul>
                        @empty
                        <p>Sin Idiomas</p>
                        @endforelse
                    </div>

                    <hr
                        style="
                            width: 95%;
                            background-color: #fff;
                            border: none;
                            height: 5px;
                        "
                    />
                    <div class="contenedor">
                        <div class="elemento-relativo"></div>
                    </div>
                    <div style="color: #fff; padding: 8px">
                        REFERENCIAS
                        <br />
                        <br />
                        <ul>
                            <li>
                                {{ $ref1 }} -
                                {{ $tel1 }}
                            </li>
                            <li>
                                {{ $ref2 }} -
                                {{ $tel2 }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div
                class="col-8 h"
                style="float: left; margin-left: 10px; margin-right: 10px"
            >
                <div style="height: auto; padding: 8px">
                    <h1>{{ $nombres }}</h1>
                </div>
                <hr
                    style="
                        width: 95%;
                        background-color: #005c38;
                        border: none;
                        height: 5px;
                    "
                />
                <div class="contenedor">
                    <div
                        class="elemento-relativo"
                        style="background-color: #005c38; left: 0; width: 50px"
                    ></div>
                </div>
                <div
                    style="
                        height: auto;
                        padding-left: 10px;
                        padding-right: 10px;
                    "
                >
                    <h3 style="color: #005c38">RESUMEN PROFESIONAL</h3>
                    {{ $perfilProfesional }}
                </div>

                <hr
                    style="
                        width: 95%;
                        background-color: #005c38;
                        border: none;
                        height: 5px;
                    "
                />
                <div class="contenedor">
                    <div
                        class="elemento-relativo"
                        style="background-color: #005c38; left: 0; width: 50px"
                    ></div>
                </div>
                <div
                    style="
                        height: auto;
                        padding-left: 10px;
                        padding-right: 10px;
                    "
                >
                    <h3 style="color: #005c38">HISTORIAL LABORAL</h3>

                    @forelse($experiencias as $experiencia)
                    <p>{{ $experiencia->puestoTrabajo }}</p>
                    {{ date('Y - M', strtotime($experiencia->inicioExperiencia)) }}
                    /
                    {{ date('Y - M', strtotime($experiencia->finExperiencia)) }}
                    <br />
                    <strong> {{ $experiencia->puestoTrabajo }} | </strong>
                    {{ $experiencia->lugarTrabajo }}
                    <br />
                    • {{ $experiencia->descripcionLaboral }}
                    <br />
                    <br />
                    @empty
                    <p>Sin experiencia laboral</p>
                    @endforelse
                </div>

                <hr
                    style="
                        width: 95%;
                        background-color: #005c38;
                        border: none;
                        height: 5px;
                    "
                />
                <div class="contenedor">
                    <div
                        class="elemento-relativo"
                        style="background-color: #005c38; left: 0; width: 50px"
                    ></div>
                </div>
                <div
                    style="
                        height: auto;
                        padding-left: 10px;
                        padding-right: 10px;
                    "
                >
                    <h3 style="color: #005c38">FORMACIÓN</h3>

                    @forelse($formacions as $formacion)
                    {{date('Y - M', strtotime($formacion->anioInicioFormacion))}}
                    /
                    {{date('Y - M', strtotime($formacion->anioFinFormacion))}}
                    <br />
                    {{ $formacion->tituloObtenido }} -
                    {{ $formacion->nivelFormacion }}
                    <br />
                    {{ $formacion->institucionFormacion }}
                    <br />
                    <br />
                    @empty
                    <p>Sin Formación Educativa</p>
                    @endforelse
                </div>

                <hr
                    style="
                        width: 95%;
                        background-color: #005c38;
                        border: none;
                        height: 5px;
                    "
                />
                <div class="contenedor">
                    <div
                        class="elemento-relativo"
                        style="background-color: #005c38; left: 0; width: 50px"
                    ></div>
                </div>
                <div
                    style="
                        height: auto;
                        padding-left: 10px;
                        padding-right: 10px;
                    "
                >
                    <h3 style="color: #005c38">ENLACES</h3>

                    <ul>
                        <li>
                            {{ $publicaciones }}
                        </li>
                    </ul>
                </div>

                <hr
                    style="
                        width: 95%;
                        background-color: #005c38;
                        border: none;
                        height: 5px;
                    "
                />
                <div class="contenedor">
                    <div
                        class="elemento-relativo"
                        style="background-color: #005c38; left: 0; width: 50px"
                    ></div>
                </div>
                <div
                    style="
                        height: auto;
                        padding-left: 10px;
                        padding-right: 10px;
                    "
                >
                    <h3 style="color: #005c38">ÁREAS DE INTERES</h3>

                    <ul>
                        <li>
                            {{ $intereses }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
