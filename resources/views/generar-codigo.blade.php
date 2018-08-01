@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="offset-1 col-md-6 fondo-color">
            <h1>Ｐ ｒ ｏ ｍ ｏ ｃ ｏ ｄ ｅ</h1>
            <form>
                <p class="letra-chica-2">Presioná para generar un nuevo código válido:</p>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Generar código</button>
                    <?php 
                        // Aca llamo a la funcion que me crea un promocode en la db
                        Promocodes::create($amount = 1, $reward = null,  $data = [], $expires_in = null);
                        $codigo = DB::table('promocodes')->get();
                        $id = count($codigo);
                        $codigoGenerado = DB::table('promocodes')->find($id);
                        echo "El codigo generado es: $codigoGenerado->code"; 
                    ?>
                </div>
            </form>
            <br>
        </div>
    </div>     


@endsection