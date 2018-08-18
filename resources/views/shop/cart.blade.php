@extends('layouts.app')

@section('title', ' - Shop cart')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <br><br>

                {{-- SELECCION DE PRODUCTOS --}}
                <div class="card">
                    <div class="card-header">{{ __('Buy what you want:') }}</div>

                    <div class="card-body">

                        {{-- FORMULARIO --}}
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

                    </div>
                </div>

                <br><br>

                {{-- carro DE COMPRAS --}}
                <div class="card">
                    <div class="card-header">{{ __('Your current cart:') }}</div>

                    <div class="card-body">
                        @if(isset($carro_compras) && count($carro_compras) > 0)

                            {{-- TABLA --}}
                            <table class="table table-striped table-borderless table-lg">

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

                                <tbody>
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

                                {{-- TOTAL --}}
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
                        @else
                            <p class="text-center"><i>Mmm, this is empty. Buy something!</i></p>
                        @endif
                    </div>
                </div>

                <br><br>

                <div class="text-center">
                    <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
                        {{ __('Back')}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
