@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="offset-1 col-md-6 fondo-color">
            <h1> Welcome to promocode</h1>
            <br>
            <h3> The place where you and your friends can share your promocodes </h3>
            <br>
            <ul class="nav justify-content-center">

                <li class="nav-item">
                    <a class="nav-link" href="/generar">Generar código</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/usar">Usar código</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/data">Ver base de datos</a>
                </li>
                
            </ul>
        </div>
        <br>
    </div>
    
@endsection