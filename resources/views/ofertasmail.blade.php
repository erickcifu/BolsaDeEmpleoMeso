<!DOCTYPE html>
<html>
    <head>
        <title>{{ $subject }}</title>
    </head>
    <body>
        <h1 style="color: #005c35;">{{ $subject }}</h1>

        @if(count($resultados) > 0)
        <ul>
            @foreach($resultados as $oferta)
            <li>
                {{ $oferta->nombrePuesto }} -
                {{ $type === "vencidas" ? "venció" : "vencerá el" }}:
                {{ $oferta->fechaMax }}
            </li>
            @endforeach
        </ul>
        @else
        <p>No se encontraron ofertas para su empresa.</p>
        @endif

        <p> Si deseas aplazar la fecha de vencimiento puedes ingresar al portal de Ofertas y modificar el las ofertas </p>
        
        <a href="{{ $url }}" style="color: #005c35;">Ir al portal</a>

        <br>
        <br>
        <br>

        <p>
            Gracias por utilizar el portal de Ofertas de la Universidad
            Mesoamericana.
        </p>
        <p>Este es un correo automatico, no contestar.</p>
    </body>
</html>
