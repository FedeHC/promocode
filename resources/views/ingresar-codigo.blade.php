@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="offset-1 col-md-4 fondo-color">
            <h1>Ｐ ｒ ｏ ｍ ｏ ｃ ｏ ｄ ｅ</h1>
            <form>
                <div class="form-group">
                    <label for="input-codigo">Ingresá tu código acá:</label>
                    <input type="text" class="form-control" id="input-codigo" placeholder="código">
                    <p class="letra-chica-1">Código válido por única vez para cada usuario.</p>
                </div>

                <button type="submit" class="btn btn-success">Enviar código</button>
                <button type="reset" class="btn btn-default">Borrar todo</button>
            </form>
            <br>
        </div>
    </div>
</div>
@endsection