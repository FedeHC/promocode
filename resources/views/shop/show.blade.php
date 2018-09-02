@extends('layouts.app')

@section('title', ' - Shop cart')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <br><br>

                {{-- SELECCION DE PRODUCTOS --}}
                <div class="card">
                    <a id="products"></a>
                    <div class="card-header">Products:</div>
                    <div class="card-body">
                        @include('shop.products')
                    </div>
                </div>

                <br><br>

                {{-- CARRO DE COMPRAS --}}
                <div class="card">
                    <a id="cart"></a>
                    <div class="card-header">Shop cart:</div>
                    <div class="card-body table-responsive">
                        @include('shop.cart')
                    </div>
                </div>

                <br><br>

                {{-- Botón volver: --}}
                <div class="text-center">
                    <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
                        {{ __('Back')}}</a>
                </div>

            </div>
        </div>
    </div>
@endsection
