@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="offset-1 col-md-6 fondo-color">
            <h1> Welcome to promocode</h1>
            <br>
            <h3> The place where you and your friends can share your promocodes </h3>
            <br>
        </div>
        <br>
    </div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="/generar">Generar código</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/usar">Usar código</a>
        </li>
    </ul>
@endsection