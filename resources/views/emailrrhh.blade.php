<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">
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
	<h1>Saludos, {{$empresa}}</h1>
	<p> El departamento de Recursos Humanos de Universidad Mesoamericana a visto su solicitud, el estado es: <B>{{$estadoSolicitud}}</B>.</p>
	@if($estadoSolicitud == 'Aceptado')
		<p>Por favor, lea las instrucciones que a continuación se presentan para saber como continuar en su proceso.</p>
		<ol>
			<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
			<li>Inicie sesión con sus credenciales.</li>
			<li>Visualizará habilitado el menú de funciones para empresas, si tiene dudas sobre las acciones que puede realizar dentro del sistema le invitamos a ver los <a href="https://bolsatrabajo.umes.edu.gt/tutoriales" style="color: #005c35;">tutoriales</a>, dentro de la sección "Empresas"</li>
		</ol>
	@elseif($estadoSolicitud == 'Verificar RTU')
		<p>Probablemente haya subido un archivo de RTU equivocado o alguno de los datos dentro del documento sea incorrecto.</p>
		<p>Por favor, lea las instrucciones que a continuación se presentan para saber como continuar en su proceso.</p>
		<ol>
			<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
			<li>Inicie sesión con sus credenciales.</li>
			<li>Realice la revisión o cambio de archivo que se le solicita.</li>
		</ol>
		
	@elseif($estadoSolicitud == 'Verificar Patente de comercio')
		<p>Probablemente haya subido un archivo de patente de comercio equivocado o alguno de los datos dentro del documento sea incorrecto.</p>
		<p>Por favor, lea las instrucciones que a continuación se presentan para saber como continuar en su proceso.</p>
		<ol>
			<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
			<li>Inicie sesión con sus credenciales.</li>
			<li>Realice la revisión o cambio de archivo que se le solicita.</li>
		</ol>
	@elseif($estadoSolicitud == 'Verificar Patente de comercio y RTU')
		<p>Probablemente haya subido un archivo equivocado de patente de comercio ó RTU, de lo contrario verifique que los datos dentro de los documentos sean correctos.</p>
		<p>Por favor, lea las instrucciones que a continuación se presentan para saber como continuar en su proceso.</p>
		<ol>
			<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
			<li>Inicie sesión con sus credenciales.</li>
			<li>Realice la revisión o cambio de archivos que se le solicitan.</li>
		</ol>
	@elseif($estadoSolicitud == 'Denegado')
		<p>Probablemente haya subido un archivo equivocado o alguno de los datos dentro de los documentos sea incorrecto.</p>
		<p>Por favor, lea las instrucciones que a continuación se presentan para saber como continuar en su proceso.</p>
		<ol>
			<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
			<li>Inicie sesión con sus credenciales.</li>
			<li>Realice la revisión o cambio de archivos, de esa manera su solicitud será enviada nuevamente al departamento de Recursos Humanos.</li>
		</ol>
	@endif
	<p>Si tiene alguna consulta adicional, no dude en enviarnos un correo a: <b>bolsaempleoquetzaltenango@umes.edu.gt</b></p>

	<p><b>¡Gracias por utilizar la bolsa de empleo de Universidad Mesoamericana!</b></p>
	<img src="https://i.ibb.co/k30rYxd/firmamail.jpg" />
	<small><b>Este es un correo automatico, no contestar.</b></small>
	
</body>
</html>