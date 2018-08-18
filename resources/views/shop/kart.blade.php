{{-- Tabla con productos del carrito de compras: --}}
@if(isset($carro_compras) && count($carro_compras) > 0)

    {{-- La Tabla: --}}
    <table class="table table-striped table-borderless table-lg">

        {{-- Cabecera: --}}
        <thead class="thead-dark">
            <tr class="table-secondary">
                <th scope="col">Id</th>
                <th scope="col"></th>
                <th scope="col">Product</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Final Price</th>
                <th scope="col"></th>
            </tr>
        </thead>

        {{-- Cuerpo de la Tabla: --}}
        <tbody>

            {{-- Generando filas de productos desde el array 'carro_compras' --}}
            @foreach($carro_compras as $array_producto)
                <tr>
                    @foreach($array_producto as $key => $value)

                        @if($key == 'id')
                            <td>
                                <p><b>#{{ $value }}</b></p>
                            </td>

                            {{-- Agregando imágen como 2° columna (después de id): --}}
                            <td>
                                <img src="{{ asset('imagenes/price-tag.png')}}" width="70"/>
                            </td>

                        @elseif($key == 'nombre')
                            <td><h1>{{ $value }}</h1>

                        @elseif($key == 'descripcion')
                            <p>{{ $value }}</p></td>

                        @elseif($key == 'precio_unitario')
                            <td>$ {{ $value }}</td>

                        @elseif($key == 'cantidad')
                            <td><b>x {{ $value }}</b></td>

                        @else
                            <td><h4>${{ $value }}</h4></td>

                            <td>
                                {{-- Formulario para botón de eliminar productos --}}
                                <form method="post">
                                    @csrf
                                    <input type="hidden" name="posicion" value="{{ $array_producto['id'] }}" />
                                    <input type="submit" name="quitar" class="btn btn-outline-danger btn-sm" value="x" />
                                </form>
                            </td>
                        @endif

                    @endforeach
                </tr>
            @endforeach

            {{-- Ultima fila con el TOTAL --}}
            @if(isset($total))
            <tr class="table-secondary">
                <td colspan="2"></td>
                <td>
                    <h2>Total:</h2>
                    <p><i>All taxes included.</i></p>
                </td>
                <td colspan="2"></td>
                <td colspan="2 text-left"><h2>${{ $total }}</h2></td>
            </tr>
            @endif
        </tbody>
    </table>

{{-- Si el carrito viene vacío: --}}
@else
    <p class="text-center"><i>Mmm, this is empty. Buy something!</i></p>
@endif
