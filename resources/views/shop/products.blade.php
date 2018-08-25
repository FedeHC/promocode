{{-- Formulario con productos p/comprar: --}}
<form method="post" action="#ver">
    @csrf

    <div class="row">

        {{-- PRODUCTOS --}}
        <div class="col-md-6">
            <label>Product & Price:</label>
            <div class="form-group">
                <select name="products" class="custom-select" required>
                    {{-- Nota: el ':' sirve de caracter separador en controller. --}}
                    @if(isset($todos_productos))
                        @foreach($todos_productos as $p)
                            <option value="{{ $p[0] }}:{{ $p[1] }}">{{ $p[0] }} - ${{ $p[1] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        {{--  x  --}}
        <div class="col-md-1 text-center align-self-md-center">
            <br>
            <p><b>x</b></p>
        </div>

        {{-- CANTIDAD --}}
        <div class="col-md-2">
            <label>Quantity:</label>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control text-center" name="quantity" value="1" step="1" min="1" max="100" />
                </div>
            </div>
        </div>


        {{--  =  --}}
        <div class="col-md-1 text-center align-self-md-center">
            <br>
            <p><b>=</b></p>
        </div>

        {{-- BOTON AGREGAR--}}
        <div class="col-md-2 text-center">
            <label>Add:</label>
            <div class="form-group">
                <div class="input-group justify-content-center">
                    <input type="submit" name="agregar" class="btn btn-block btn-outline-primary" value="Buy!" />
                </div>
            </div>
        </div>

    </div>
</form>
