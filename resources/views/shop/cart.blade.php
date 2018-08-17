@extends('layouts.app')

@section('title', ' - Shop cart')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <br><br>

                <div class="card">
                    <div class="card-header">{{ __('Buy what you want:') }}</div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form method="post">
                            @csrf

                            <div class="row">

                                {{-- PRODUCTOS --}}
                                <div class="col-sm-6">
                                    <label>Product & Price:</label>
                                    <div class="form-group">
                                        <select name="products" class="custom-select" autofocus required>
                                            <option value="Cool T-Shirt:25">Cool T-Shirt - $25</option>
                                            <option value="Awesome Jeans:50">Awesome Jeans - $50</option>
                                            <option value="Incredible Shoes:100">Incredible Shoes - $100 </option>
                                            <option value="Fabulous Lenses:75">Fabulous Lenses - $75</option>
                                            <option value="Nice Sweater:60">Nice Sweater - $60</option>
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

                <div class="card">
                    <div class="card-header">{{ __('Your current cart:') }}</div>

                    <div class="card-body">
                        @if(isset($carrito_compras) && count($carrito_compras) > 0)

                            {{-- TABLA --}}
                            <table class="table table-striped table-borderless table-lg">

                                <thead class="thead-secondary">
                                <tr class="table-secondary">
                                    <th scope="col"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Final Price</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($carrito_compras as $array_producto)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('imagenes/price-tag.png')}}" width="70"/>
                                        </td>
                                        @foreach($array_producto as $key => $value)

                                            @if($key == 'nombre')
                                                <td><h1>{{ $value }}</h1>

                                            @elseif($key == 'descripcion')
                                                <p>{{ $value }}</p></td>

                                            @elseif($key == 'precio_unitario')
                                                <td>$ {{ $value }}</td>

                                            @elseif($key == 'cantidad')
                                                <td><b>x {{ $value }}</b></td>

                                            @elseif($key == 'precio_final')
                                                <td><h4>$ {{ $value }}</h4>
                                            @else
                                                <td>
                                                    <form method="post">
                                                        @csrf
                                                        <input type="hidden" name='posicion' value="{{ $value }}">
                                                        <input type="submit" name="quitar" class="btn btn-outline-secondary btn-sm" value="x" />
                                                    </form>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach

                                {{-- TOTAL --}}
                                @if(isset($total))
                                <tr class="table-secondary">
                                    <td class="text-right" colspan="4">Total:</td>
                                    <td class="h3">$ {{ $total }}</td>
                                    <td></td>
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
