@php
    use Carbon\Carbon;
@endphp
<!doctype html>
<html lang="es">

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
			@php
                $cartaEncontrada = true;
            @endphp
			<p></p>
			<p></p>
			<p></p>
			
			<li class="list-unstyled">
				<h6>
				
				</h6>
			</li>
			<br>
			<br>
			<br>
			<p><b>A QUIEN INTERESE: </b></p>
			<br>
			<p class="text-justify">

			Por medio de la presente, hago constar que la persona
			<b> {{ $item->estudiante->nombre }} {{ $item->estudiante->apellidos}}</b>, quién se identifica con número 
			de CUI <b>{{$item->estudiante->DPI}}</b>, se caracteriza por ser <b>{{ $item->cargoYTareasRealizadas }}</b>,
			por lo que no tengo ningún inconveniente en RECOMENDARLO a cualquier persona, empresa o institución que requieran sus servicios.
			</p>
			<p></p>
			<p></p>
			<p></p>
			

		<p class="text-justify">
		Y para los usos legales que al interesado convenga, extiendo y firmo la presente en la ciudad de Quetzaltenango, a los {{ Carbon::parse($item->fechaCarta)->locale('es')->isoFormat('D [días del mes de] MMMM [del año] YYYY') }}. 

		
		</p>

		<br>
		<br>
		<br>
		<p>Atentamente:   </p>
		<br>
		<br>
		<p class="text-center">
		<img src="{{$item->firmaAutoridad}}" alt="" width="100" height="100"/>
		</p>
		<p class="text-center">{{$item->autoridadAcademica->nombreAutoridad}}  {{$item->autoridadAcademica->apellidosAutoridad}}</p>
		<p class="text-center"> Tel: {{$item->telefonoAutoridad}}</p>
		<br>
		<br>
		<br><br>
		<br>
		<br>
		@endif
	@endforeach
	@foreach ($ccartarecomendacions as $item)
		@if ($item->estudiante->user_id == $usuario)
			@php
				$cartaEncontrada = true;
			@endphp
		@endif
	@endforeach

	@if (!isset($cartaEncontrada) || !$cartaEncontrada)
		@php
			abort(redirect('/ofertasestudiantes')->with('message', 'No tienes una carta'));
		@endphp
	@endif	

</body>

</html>