<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Carta de Recomendacion</title>
</head>

<body>
{!! $view2 !!}
	@if($cartaEncontrada)
		@foreach ($cartasT as $item)
		
				@if ( $item->estudiante->user_id==$usuario)
				<p></p>
				<p></p>
				<p></p>
				
				<li class="list-unstyled">
					<h6>
					
					</h6>
				</li>
				<p></p>
				<p>Quetzaltenango, Guatemala. </p>
				<p></p>
				<br>
				<br>
				
				<br>
				<br>
				<br>
				<p><b>A quién pueda interesar: </b></p>
				<br>
				<p class="text-justify">

				A través de la presente, extiendo mi recomendación personal en apoyo del estudiante
				<b> {{ $item->estudiante->nombre }} {{ $item->estudiante->apellidos}} </b>, quién se identifica con número 
				de carné <b>{{$item->estudiante->carnet}}</b>, que se destaca por <b>{{ $item->cargoYTareasRealizadas }} </b>.  
				</p>
				<p></p>
				<p></p>
				<p></p>
				

			<p class="text-justify">
			Y para los usos que al  interesado convenga, extiendola presente en la fecha {{ date('d/m/Y', strtotime($item->fechaCarta)) }}. 
			
			</p>

<<<<<<< HEAD
		<br>
		<br>
		<br>
		<p>Atentamente,   </p>
		<br>
		<br>
		<p class="text-center">
		<img src="{{$item->firmaAutoridad}}" alt="" width="100" height="100"/>
		</p>
		<p class="text-center">{{$item->autoridadAcademica->nombreAutoridad}}  {{$item->autoridadAcademica->apellidosAutoridad}}</p>
		<p class="text-center"> cel: {{$item->telefonoAutoridad}}</p>
		<br>
		<br>
		<br><br>
		<br>
		<br>
		@endif
	@endforeach
	@if (!$cartaEncontrada)
	<div wire:poll.4s class="btn btn-sm btn-warning" style="position: fixed; top: 50px; right: 10px; z-index: 1000; width: 500px;"> No existe carta </div>				
    @endif
=======
			<br>
			<br>
			<br>
			<p>Atentamente,   </p>
			<br>
			<br>
			<p class="text-center">
			<img src="{{$item->firmaAutoridad}}" alt="" width="100" height="100"/>
			</p>
>>>>>>> 02dad3a19f57495922761bf41373ac59ea310875
	

</body>

</html>