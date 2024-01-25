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
	<p>Lea las instrucciones que a continuación se presentan para saber como continuar en su proceso.</b>
	<p><b>Si se solicita verificación de archivos:</b>
	<ol>
		<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
		<li>Inicie sesión con sus credenciales.</li>
		<li>Realice la revisión y cambio de archivos que se le solicitan.</li>
	</ol>
	</p>

	<p><b>Si el estado es "Aceptado":</b>
	<ol>
		<li>Dirijase al <a href="https://bolsatrabajo.umes.edu.gt/login" style="color: #005c35;">portal de la bolsa de empleo.</a></li>
		<li>Inicie sesión con sus credenciales.</li>
		<li>Visualizará habilitado el menú de funciones para empresas, si tiene dudas sobre las acciones que puede realizar dentro del sistema le invitamos a ver los <a href="https://bolsatrabajo.umes.edu.gt/tutoriales" style="color: #005c35;">tutoriales</a>, dentro de la sección "Empresas"</li>
	</ol>
	</p>
	<p>Si tiene alguna consulta adicional, no dude escribir un correo a: <b>bolsaempleoquetzaltenango@umes.edu.gt</b></p>

	<p><b>¡Gracias por utilizar la bolsa de empleo de Universidad Mesoamericana!</b></p>
	<img src="https://i.ibb.co/k30rYxd/firmamail.jpg" />
	<small><b>Este es un correo automatico, no contestar.</b></small>
	
</body>
</html>