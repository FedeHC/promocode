{{-- Formulario con productos --}}
<form method="post">
    @csrf

    <div class="row">

        {{-- PRODUCTOS --}}
        <div class="col-sm-6">
            <label>Product & Price:</label>
            <div class="form-group">
                <select name="products" class="custom-select" required>
                    @if(isset($todos_productos))
                        @foreach($todos_productos as $p)
                            <option value="{{ $p[0] }}:{{ $p[1] }}">{{ $p[0] }} - ${{ $p[1] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        {{--  x  --}}
        <div class="col-sm-1 text-center align-self-sm-center">
            <br>
            <p><b>x</b></p>
        </div>

        {{-- CANTIDAD --}}
        <div class="col-sm-2">
            <label>Quantity:</label>
            <div class="form-group">
                <div class="input-group">
                    <input type="number" class="form-control" name="quantity" value="1" step="1" min="1" max="100" />
                </div>
            </div>
        </div>


        {{--  =  --}}
        <div class="col-sm-1 text-center align-self-sm-center">
            <br>
            <p><b>=</b></p>
        </div>

        {{-- BOTON AGREGAR--}}
        <div class="col-sm-2">
            <label>Cart:</label>
            <div class="form-group">
                <div class="input-group justify-content-start">
                    <input type="submit" name="agregar" class="btn btn-outline-primary" value="Add!" />
                </div>
            </div>
        </div>

    </div>
</form>
