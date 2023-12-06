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
  	@foreach ($ccartarecomendacions as $item)
	@if ( $item->estudiante->user_id==$usuario)
	<p></p>
	<p></p>
	<p></p>
	
	<li class="list-unstyled">
		<h6>
		
		</h6>
	</li>
	<p></p>
	<p></p>
	<p></p>
	<br>
	<br>

	<h5> A QUIEN INTERECE </h5>
	<br>
	<br>
	<br>
	<br>

<p class="text-justify">

Por este medio, hago constar que el portador de la presente,
<b> {{ $item->estudiante->nombre }} {{ $item->estudiante->apellidos}} </b> quien se identifica con número 
de carnet, <b>{{$item->estudiante->carnet}} </b> es estudiante de Universidad Mesoamericana sede Quetzaltenango, 
 <b>{{ $item->cargoYTareasRealizadas }} </b>.  
</p>
<p></p>
<p></p>
<p></p>
	

<p class="text-justify">
Y para los usos que al  interesado convenga, extiendola presente en la fecha {{ date('d/m/Y', strtotime($item->fechaCarta)) }}. 
 
</p>

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
	@else
	<h2 class="text-center">no existe carta</h2>
		
	@endif

	
                          

  
		
	@endforeach

</body>

</html>