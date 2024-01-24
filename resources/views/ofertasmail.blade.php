<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
	<style type="text/css">
        <title>{{ $subject }}</title>
	
		body{
			font-family: 'Bariol Serif';
			font-size: 15px;
		}
		h1{
			font-size: 20px;
			font-weight: bold;
			text-decoration: underline;
		}
	</style>
    </head>
    <body>
        <h1 style="color: #005c35;">{{ $subject }}</h1>

        @if(count($resultados) > 0)
        <ul>
            @foreach($resultados as $oferta)
            <li>
                {{ $oferta->nombrePuesto }} -
                {{ $type === "vencidas" ? "Venció el día" : "Vencerá el día" }}:
                {{ $oferta->fechaMax }}
            </li>
            @endforeach
        </ul>
        @else
        <p>No se encontraron ofertas para su empresa.</p>
        @endif

        <p> Si desea aplazar la fecha de vencimiento, puede ingresar al portal de Ofertas y modificar la fecha límite</p>
        
        <a href="{{ $url }}" style="color: #005c35;">Ir al portal</a>

        <br>
        <br>
        <br>
        <p>Si tiene alguna consulta, no dude escribir un correo a: <b>bolsaempleoquetzaltenango@umes.edu.gt</b></p>
        <br>
        <p><b>¡Gracias por utilizar la bolsa de empleo de Universidad Mesoamericana!</b></p>
	    <img src="https://i.ibb.co/k30rYxd/firmamail.jpg"/>

        <small><b>Este es un correo automatico, no contestar.</b></small>
    </body>
</html>
