@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Welcome
            @guest
                {{ "Stranger" }}
            @else
                {{ @Auth::user()->name }}
            @endif !</h1>
        </div>
    </div>
        {{--<!DOCTYPE html>--}}
        {{--<html lang="es">--}}
        {{--<head>--}}
            {{--<meta charset="UTF-8">--}}
            {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
            {{--<title>Probando</title>--}}
        {{--</head>--}}
        {{--<body>--}}
            {{--<h1>Welcome--}}
                {{--@guest--}}
                    {{--{{ "Stranger" }}--}}
                {{--@else--}}
                    {{--{{ @Auth::user()->name }}--}}
                {{--@endif !</h1>--}}
        {{--</body>--}}
        {{--</html>--}}
@endsection