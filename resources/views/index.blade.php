@extends('layouts.app')

@section('content')
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Probando</title>
        </head>
        <body>
            <h1>Welcome
                @guest
                    {{ "Stranger" }}
                @else
                    {{ @Auth::user()->name }}
                @endif !</h1>
            <p>Acá tiene que ir todo el blade de bienvenida y también la<br>pantalla principal cuando un user esté logueado.</p>
        </body>
        </html>
@endsection