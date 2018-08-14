<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Título (Nota: no olvidarse de poner 'PromoCODE' en archivo '.env'
          mmmmmmmmmmm...... --}}
    <title>Promocode</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Fonts usadas (Nota: habría que descargarlas en una carpeta local --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    {{-- Estilos --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    {{-- NAVBAR --}}
    @include('layouts.nav')

    {{-- CONTENIDO DE LAS VISTAS --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('layouts.footer')
</div>

</body>
</html>
