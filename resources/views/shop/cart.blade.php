@extends('layouts.app')

@section('title', ' - Shop cart')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        {{ __('Shop cart:') }}
                    </div>

                    <div class="card-body">

                        <form method="post">
                            @csrf
                            {{-- PRODUCTOS --}}
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="products">Choose the products you want:</label>

                                        <select name="products" class="custom-select">
                                            <option value="1">Cool T-Shirts</option>
                                            <option value="2">Awesome Jeans</option>
                                            <option value="3">Incredible Shoes</option>
                                            <option value="4">Fabulous Cups</option>
                                            <option value="5">Marvelous Lenses</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- CANTIDAD Y BOTON AGREGAR--}}
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="quantity">Quantity:</label>

                                        <div class="input-group">
                                            <input type="number" class="form-control" name="quantity" step="1" min="1" max="100" />
                                            <input type="submit" class="form-control" value="add!" />
                                        </div>
                                    </div>
                                </div>

                                {{-- LISTA --}}
                                <div class="col-sm-5 offset-sm-1">
                                    <div class="form-group">
                                        <label class="">Your current list:</label>

                                        <ul class="list-group">
                                            <li class="list-group-item disabled">empty</li>
                                        </ul>
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
