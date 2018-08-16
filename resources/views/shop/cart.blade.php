@extends('layouts.app')

@section('title', ' - Shop cart')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <br><br>

                <div class="card">
                    <div class="card-header">{{ __('Shop cart:') }}</div>

                    <div class="card-body">

                        {{-- FORM --}}
                        <form method="post">
                            @csrf

                            <div class="row">

                                    {{-- FILA CONTROLES --}}
                                    <div class="col-sm-3">
                                        <label>Choose what you want:</label>
                                        <div class="form-group">
                                            <select name="products" class="custom-select" autofocus>
                                                <option selected disabled>- Products -</option>
                                                <option value="Cool T-Shirts">Cool T-Shirts</option>
                                                <option value="Awesome Jeans">Awesome Jeans</option>
                                                <option value="Incredible Shoes">Incredible Shoes</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{--  X  --}}
                                    <div class="col-sm-1 text-center align-self-sm-center">
                                        <br>
                                        <p><b>x</b></p>
                                    </div>

                                    {{-- CANTIDAD Y BOTON AGREGAR--}}
                                    <div class="col-sm-2">
                                        <label>Quantity:</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="quantity" value="1" step="1" min="1" max="100" />
                                                <input type="submit" name="agregar" class="btn btn-outline-primary" value="add!" />
                                            </div>
                                        </div>
                                    </div>


                                {{--  =  --}}
                                <div class="col-sm-1 text-center align-self-sm-center">
                                    <br>
                                    <p><b>=</b></p>
                                </div>

                                {{-- LISTA --}}
                                <div class="col-sm-5">
                                    <label>Your current list:</label>
                                    <div class="list-group">
                                        <div class="row">
                                            <div class="col-10">
                                                <a href="#" class="list-group-item list-group-item-action disabled">
                                                    @if(isset($producto) && isset($cantidad))
                                                        {{ $producto }}
                                                        <span class="badge badge-secondary badge-pill">
                                                            x {{ $cantidad }}
                                                        </span>
                                                    @elseif(isset($borrar))
                                                        empty
                                                    @else
                                                        empty
                                                    @endif
                                                </a>
                                            </div>

                                            <div class="col-1">
                                                <input type="submit" name="quitar" class="btn btn-outline-danger" value="x" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

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
