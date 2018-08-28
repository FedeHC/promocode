{{-- Tabla del carrito de compras: --}}
@if(isset($compras) && count($compras) > 0)

    {{-- La Tabla: --}}
    <table class="table table-striped table-borderless">

        {{-- Cabecera de la tabla: --}}
        <thead class="thead-dark">
            <tr class="table-secondary">
                <th scope="col">#</th>
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

            {{-- Generando filas de productos desde el array 'compras' --}}
            @foreach($compras as $producto)
                <tr>

                    <td><p><b>{{ $loop->iteration }})</b></p></td>

                    <td><img src="{{ asset('imagenes/price-tag.png')}}" width="70"/></td>

                    <td><h1>{{ $producto['nombre'] }}</h1>

                     <p>{{ $producto['descripcion'] }}</p></td>

                    <td>$ {{ $producto['precio_unitario'] }}</td>

                    <td><b>x {{ $producto['cantidad'] }}</b></td>

                    <td><h4>${{ $producto['precio_final'] }}</h4></td>

                    {{-- Formulario con ID y botón p/eliminar productos: --}}
                    <td>
                        <form method="post" action="#cart">
                            @csrf
                            <input type="hidden" name="posicion" value="{{ $loop->iteration }}" />
                            <input type="submit" name="quitar" class="btn btn-outline-danger btn-md" value="x" />
                        </form>
                    </td>

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

            {{-- [NO BORRAR: CODIGO PARA CHEQUEAR/DEBUGGEAR]
            <tr><td colspan="7"><pre>
                @php
                    {{ print_r($compras); }}
                @endphp
            </pre>
            --}}

            @endif
        </tbody>
    </table>

{{-- Si el carrito viene vacío: --}}
@else
    <p class="text-center"><i>Mmm, this is empty. Buy something!</i></p>
@endif
