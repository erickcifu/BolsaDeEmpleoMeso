<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
/>

@extends('layouts.app') @section('title', __('Welcome')) @section('content')

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
    <div  style="display: inline-block; background-color: rgba(0, 92, 53, 0.6); padding: 10px;">
        <h2 style="color: #f0eadc;">Estudiantes</h2>
    </div>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/PIeV3Z_eRYI?si=8TTIIItHk2OscjKH" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear cuenta</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/PIeV3Z_eRYI?si=8TTIIItHk2OscjKH" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear perfil</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/PIeV3Z_eRYI?si=8TTIIItHk2OscjKH" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear CV</p>
                </div>
            </div>
        </div>
    </div>
</div>
    

<!-- Empresas -->
<div  style="display: inline-block; background-color: rgba(0, 92, 53, 0.6); padding: 10px;">
        <h2 style="color: #f0eadc;">Empresas</h2>
    </div>
    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/PIeV3Z_eRYI?si=8TTIIItHk2OscjKH" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Registrarse</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/PIeV3Z_eRYI?si=8TTIIItHk2OscjKH" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear solicitud</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/PIeV3Z_eRYI?si=8TTIIItHk2OscjKH" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Publicar ofertas</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
