<link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
    .footer {
    background-color: rgba(0, 92, 53, 0.8); /* Color de fondo claro */
    padding: 20px 0; /* Espaciado vertical */
}

.footer p {
    margin-bottom: 5px; /* Espaciado entre párrafos */
}

@media (max-width: 576px) {
    .footer p {
        font-size: 14px; /* Tamaño de fuente más pequeño en dispositivos móviles */
    }
},
    #info-btn {
        background-color: rgba(0, 92, 53, 0.6);
        padding: 10px;
        color: #ffffff; /* Texto en color blanco */
        cursor: pointer; /* Cambia el cursor al pasar sobre el footer */
        white-space: nowrap; /* Para reducir el footer y el botón a una sola línea */
        text-align: center; /* Centrado del texto */
    }
    #info-btn {
    color: #005c35; 
    float: right; 
    margin-left: 150px; 
    margin-top: -45px; 
    font-size: 10px; 
    padding: 10px 20px; 
    border: 2px solid; 
    }
    

    .popover {
        max-width: 80%; /* Ancho máximo del popover */
    }

    .popover-body ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        .popover-body li {
            margin-bottom: 5px; /* Ajusta el valor según sea necesario */
        }
        
    #modalContent {
            text-align: justify;
        }

    #modalContent li {
        margin-bottom: 10px; /* Ajusta el valor según sea necesario */
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
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #005c35;">
                <h5 class="modal-title" id="infoModalLabel" style="color: #f0eadc;">Términos y condiciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #f0eadc;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol id="modalContent"> 
                    
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #005c35;">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<!-- Botón de información -->
<a id="info-btn" type="button" data-bs-toggle="popover" data-bs-trigger="click" title="Información de derechos de autor" 
data-bs-content="
Estudiantes:                                                  
Erick Alfredo Cifuentes Fuentes | erickcifu@umes.edu.gt
María Fernanda Mendoza y Mendoza | fernanda2000@umes.edu.gt 
Antulio José Barrios de león | ajlb@umes.edu.gt
Edwin Aníbal Mejía Chan | mejiachan@umes.edu.gt ">
    <i class="fa-solid fa-circle-info"></i>
</a>

</body>
<!-- Footer -->
<div class="footer text-center py-3">
    <p  style="color: #f0eadc;">Derechos de autor &copy; {{ date('Y') }} Estudiantes de la Facultad de Ingenieria. Todos los derechos reservados.</p>
    <p  class="text-decoration-underline" style="color: #f0eadc; cursor: pointer;" id="terms-conditions" data-toggle="modal" data-target="#infoModal"
     data-info="Universidad Mesoamericana no garantiza a los usuarios de la aplicación Bolsa de empleo, que sean contratados cuando se postulen a las ofertas laborales, ya que el proceso de selección y contratación lo lleva a cabo la empresa que realiza la publicación.
    Universidad Mesoamericana no se responsabiliza por la información publicada por parte de las empresas registradas en la aplicación, tampoco de las vacantes de empleo que se ofrecen dentro de la aplicación, ya que cada empresa se encarga de manera individual del proceso de contratación de los postulados.
    Universidad Mesoamericana únicamente proporciona este sitio web como un medio de comunicación, pero no adquiere una responsabilidad entre ninguna de las partes. 
    Al hacer uso de esta aplicación, cada usuario asume la responsabilidad sobre los datos que comparte dentro de la plataforma. 
    El proceso y decisión de contratación es totalmente ajeno a Universidad Mesoamericana, por lo que la misma no está obligada concluir 
    Universidad Mesoamericana mantiene estricta confidencialidad y se esfuerza por resguardar la integridad de la información publicada en esta aplicación web, sin embargo, no se responsabiliza por la posible difusión de datos por fuentes externas, ya sean agencias reclutadoras o empresas que cuentan con un usuario dentro de este sitio web.
    La Bolsa de empleo de Universidad Mesoamericana es de uso gratuito, sus usuarios están exentos de cualquier pago monetario por la utilización del software.
    Universidad Mesoamericana no es responsable de socializar a los postulantes la información de su proceso de contratación, si desea más información de la que se brinda en la aplicación web, deberá comunicarse directamente con la empresa a la cual postuló.">Términos y condiciones</p>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        // Inicializar el popover después de que se carga Livewire
        var popoverTrigger = document.getElementById('info-btn');
        var popover = new bootstrap.Popover(popoverTrigger, {
            trigger: 'click',
            html: true,
            content: function () {
                var content = popoverTrigger.getAttribute('data-bs-content');
                var items = content.split('\n').map(item => item.trim()).filter(item => item !== "");
                var list = '<ul class="list-unstyled">';
                items.forEach(function (item) {
                    list += '<li>' + item + '</li>';
                });
                list += '</ul>';
                return list;
            }
        });

        // Cerrar el popover al hacer clic fuera de él
        document.addEventListener('click', function (e) {
            if (!popoverTrigger.contains(e.target) && !document.querySelector('.popover')?.contains(e.target)) {
                popover.hide();
            }
        });
    });

    $(document).ready(function(){
        $('#infoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); 
            var info = button.data('info');
            var items = info.split('\n');
            var modalContent = $('#modalContent');
            modalContent.empty();
            items.forEach(function(item){
                $('<li></li>').text(item.trim()).appendTo(modalContent);
            });
        });
    });
</script>
@endsection


