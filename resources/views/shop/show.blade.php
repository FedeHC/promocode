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
                        @include('shop.products')
                    </div>
                </div>

                <br><br>

                {{-- CARRO DE COMPRAS --}}
                <div class="card">
                    <div class="card-header">{{ __('Your current cart:') }}</div>
                    <div class="card-body">
                        @include('shop.kart')
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
