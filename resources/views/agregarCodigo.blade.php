@extends("layouts.app")

@section("content")

<div class="container-fluid">
    <div class="row">
        <div class="offset-md-2 col-md-8 offset-sm-1 col-sm-10 fondo-color">
            <h1 class="titulo-principal">Agregar código:</h1>
            <form>
                <div class="form-group">
                    <p class="letra-chica-2">Los códigos generados podrán ser usados por cualquier usuario, una única vez.</p>
                    <label for="input-cantidad">Ingresá la cantidad de códigos que desees generar:</label>
                    <input type="text" class="form-control" id="input-cantidad" name="cantidad">
                    <button type="button" class="btn btn-default">GENERAR</button>

                    <?php
                    Promocodes::create($amount = $_POST('cantidad'), $reward = null,  $data = [], $expires_in = null);
                    $codigo = DB::table('promocodes')->get();
                    $id = count($codigo);
                    $codigoGenerado = DB::table('promocodes')->find($id);
                    //echo "El codigo generado es: $codigoGenerado->code";
                    ?>
                </div>

                <a class="btn btn-secondary" href="{{ url('/') }}">
                    {{ __('Volver')}}
                </a>
            </form>
            <br>
        </div>
    </div>
</div>

@endsection