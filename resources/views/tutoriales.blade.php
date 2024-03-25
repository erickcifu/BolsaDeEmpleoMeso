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
   /* Estilo para el footer */
   .footer {
        background-color: rgba(0, 92, 53, 0.6);
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
        color: #ffffff; /* Texto en color blanco */
        text-align: center; /* Centrado del texto */
        cursor: pointer; /* Cambia el cursor al pasar sobre el footer */
    }

    /* Estilo para el texto adicional al pasar el cursor */
    .footer:hover::after {
        content: "Haz clic aquí para más información";
        display: block;
        font-size: 12px;
        color: #ffffff;
        margin-top: 5px;
    }  
</style>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="infoModalLabel">Información adicional</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Decano De la Facultad de Ingenieria Mgt Richard Mazariegos</p>
          <p>Asesor Técnico Ing José Luis Hernández</p>
          <p>Asesora de Método Ing Jenny de Zelada</p>
          <p>Estudiantes:</p>
          <ul>
            <li>Erick Alfredo Cifuentes | Fuentes ErickCifu@umes.edu.gt</li>
            <li>María Fernanda Mendoza y Mendoza | Fuentes ErickCifu@umes.edu.gt</li>
            <li>Antulio José Barrios de león | Fuentes ErickCifu@umes.edu.gt</li>
            <li>Edwin Aníbal Mejía Chan | Fuentes ErickCifu@umes.edu.gt</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

<div id="content">
    
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
</div>
    <!-- Footer -->
    <div class="footer">
        <p>Derechos de autor &copy; {{ date('Y') }} Estudiantes de la Facultad de Ingenieria Grupo #13. Todos los derechos reservados.</p>
    </div>
</body>
</div>

@endsection


