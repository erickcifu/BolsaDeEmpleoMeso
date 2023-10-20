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
	<h2 class="text-center">Carta de Recomendacion</h2>
	<li class="list-unstyled">
		<h6> {{ $item->fechaCarta }}
		</h6>
	</li>
	<p></p>
	<p></p>
	<p></p>
	

	<h6> A quien Interese </h6>
	<br>
	<br>
	<br>
	<br>

<p class="text-justify">
El motivo de la presente es para informarle y confirmarle que tengo el gusto de conocer a <b> {{ $item->estudiante->nombre }} {{ $item->estudiante->apellidos}} </b>
con numero de carne <b>{{$item->estudiante->carnet}} </b> con toda seguridad puedo compartirle que su cargo de <b>{{ $item->cargoYTareasRealizadas }} </b> ha demostrado ser una persona con una ética 
y moral impecable. Puedo asegurarle que se trata de una persona respetuosa, amable, servicial, colaboradora y muy responsable, por
lo que extiendo a usted esta carta para recomendarlo ampliamente para cualquier actividad, responsabilidad o tarea que a usted le convenga.
</p>
<p></p>
<p></p>
<p></p>
	

<p class="text-justify">
Sin nada más que agregar por el momento, quedo a sus órdenes para cualquier duda respecto mi telefono es <b>{{$item->telefonoAutoridad}}</b>
</p>

<br>
<br>
<br>
<p>Atentamente   </p>
<br>
<br>
<p class="text-center">
<img src="{{$item->firmaAutoridad}}" alt="" width="100" height="100"/>
</p>
<p class="text-center">{{$item->autoridadAcademica->nombreAutoridad}}  {{$item->autoridadAcademica->apellidosAutoridad}}</p>
<p class="text-center">Decano de la facultad de: {{$item->autoridadAcademica->facultad->Nfacultad}}</p>
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