@extends('layouts.app')

@section('title', ' - Check code')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        {{ __('Check code:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                {{-- Formulario para chequear Promocodes: --}}
                                <form method="post">
                                    @csrf

                                    <div class="input-group">
                                        <input type="text" name="code" class="form-control"
                                               value="@if(isset($code)){{ $code }}@endif"/>
                                        <button type="submit" class="btn btn-primary">Check!</button>
                                    </div>

                                    @if(isset($mensaje))
                                        <label><b><i>{{ $mensaje }}</i></b></label>
                                    @endif
                                </form>

                                <br>

                            </div>
                        </div>
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
