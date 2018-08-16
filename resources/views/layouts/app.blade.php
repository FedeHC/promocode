<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Título (Nota: no olvidarse de poner 'PromoCODE' en archivo '.env' --}}
    <title>{{ config('app.name', 'PromoCODE') }} @yield('title')</title>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Estilos --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>

<body>
<div id="wrap">
    <div id="main">
        {{-- NAVBAR --}}
        @include('layouts.nav')

        {{-- CONTENIDO DE LAS VISTAS --}}
        @yield('content')
    </div>
    {{-- FOOTER --}}
    @include('layouts.footer')
</div>

</body>
</html>
