<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
/>

@extends('layouts.app') 
@section('title', __('')) 
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
    /* Estilo para el footer y el botón de información */
    .footer,
    #info-btn {
        background-color: rgba(0, 92, 53, 0.6);
        padding: 10px;
        color: #ffffff; /* Texto en color blanco */
        cursor: pointer; /* Cambia el cursor al pasar sobre el footer */
        white-space: nowrap; /* Para reducir el footer y el botón a una sola línea */
        text-align: center; /* Centrado del texto */
    }
    #info-btn {
    float: right; /* Alinear a la derecha */
    margin-left: 150px; /* Agregar un poco de margen izquierdo para separarlo del texto */
    margin-top: -45px; /* Ajusta la posición vertical hacia arriba */    
    }


    .popover {
        max-width: 400px; /* Ancho máximo del popover */
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
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/C6Whu7543FU" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear cuenta</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/n9L6VUYikw8" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear perfil</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/9jjwsLGQVew" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Crear CV</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/Xv2X7vVXgeM" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Funciones de estudiante y egresado</p>
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
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/qqjODOy_PI0" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Registrarse</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/DWzpcqbNyt8" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Configuraciones generales</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/rb-779Ttfhs" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Publicar ofertas</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="video" style="position: relative;"s>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/tXoviS_WILg" frameborder="0" allowfullscreen></iframe>
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background-color: rgba(0, 92, 53, 0.8); padding: 0px; text-align: center;">
                    <p class="fs-6 fw-bold" style="color: #f0eadc;">Postulaciones y entrevistas</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
<br>

<!-- Footer -->

<!-- Botón de información -->
<a id="info-btn" type="button" data-bs-toggle="popover" data-bs-trigger="hover" title="Información de derechos de autor" data-bs-content="Decano De la Facultad de Ingenieria Mgt Richard Mazariegos. ||
Asesor Técnico Ing José Luis Hernández. ||
Asesora de Método Ing Jenny de Zelada. ||
Estudiantes:                                                      
- Erick Alfredo Cifuentes Fuentes | ErickCifu@umes.edu.gt
- María Fernanda Mendoza y Mendoza | fernanda2000@umes.edu.gt 
- Antulio José Barrios de león | ajlb@umes.Edu.gt
- Edwin Aníbal Mejía Chan | mejiachan@umes.edu.gt ">
    <i class="fa-solid fa-circle-info"></i>
</a>

<!-- Footer -->
<div class="footer">
    <p>Derechos de autor &copy; {{ date('Y') }} Estudiantes de la Facultad de Ingenieria Grupo #13. Todos los derechos reservados.</p>
</div>
</body>
<script>
    document.addEventListener('livewire:load', function () {
        // Inicializar el popover después de que se carga Livewire
        new bootstrap.Popover(document.querySelector('[data-bs-toggle="popover"]'));
    });
</script>
@endsection


