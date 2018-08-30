{{-- Tabla del carrito de compras: --}}
@if(isset($cart) && $cart->count() > 0)

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
            @foreach($cart as $product)
                <tr>
                    <td><p><b>{{ $loop->iteration }})</b></p></td>

                    <td><img src="{{ asset('imagenes/price-tag.png')}}" width="70"/></td>

                    <td><h1>{{ $product->p_name }}</h1>

                         <p><i>{{ $product->p_details }}</i></p>
                    </td>

                    <td>$ {{ $product->p_price }}</td>

                    <td><b>x {{ $product->p_quantity }}</b></td>

                    <td><h4>${{ $product->p_final_price }}</h4></td>

                    {{-- Formulario con ID y botón p/eliminar productos: --}}
                    <td>
                        <form method="post" action="#cart">
                            @csrf
                            <input type="hidden" name="id_cart" value="{{ $product->id }}" />
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

            @endif
        </tbody>
    </table>

{{-- Si el carrito viene vacío: --}}
@else
    <p class="text-center"><i>Mmm, this is empty. Buy something!</i></p>
@endif
