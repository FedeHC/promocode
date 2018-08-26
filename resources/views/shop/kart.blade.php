{{-- Tabla del carrito de compras: --}}
@if(isset($carro_compras) && count($carro_compras) > 0)

    {{-- La Tabla: --}}
    <table class="table table-striped table-borderless">

        {{-- Cabecera de la tabla: --}}
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

                    <td><p><b>#{{ $loop->iteration }}</b></p></td>

                    <td><img src="{{ asset('imagenes/price-tag.png')}}" width="70"/></td>

                    @foreach($array_producto as $key => $value)

                        @if($key == 'nombre')
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
                                {{-- Formulario con ID y botón p/eliminar productos: --}}
                                <form method="post" action="#ver">
                                    @csrf
                                    <input type="hidden" name="posicion" value="{{ $loop->parent->iteration }}" />
                                    <input type="submit" name="quitar" class="btn btn-outline-danger btn-md" value="x" />
                                </form>
                            </td>
                        @endif

                    @endforeach
                </tr>
            @endforeach

            {{-- Ultima fila para el TOTAL --}}
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


            {{-- [NO BORRAR] PARA CHEQUEAR/DEBUGGEAR:
            <tr><td colspan="7"><pre>
                @php
                    {{ print_r($carro_compras); }}
                @endphp
            </pre></td></tr>
            --}}


            @endif
        </tbody>
    </table>

{{-- Si el carrito viene vacío: --}}
@else
    <p class="text-center"><i>Mmm, this is empty. Buy something!</i></p>
@endif
