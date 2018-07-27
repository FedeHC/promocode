@extends("layouts.app")

@section("content")
<div class="container-fluid">
<div class="row">
    <div class="offset-1 col-md-4 fondo-color">
        <h1>PromoCode</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Ingresá tu código:</label>
                <input type="text" class="form-control" id="input-codigo" placeholder="Código">
            </div>

            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>
</div>
@endsection