@extends('layouts.app')

@section('title', ' - Generate code')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        New code:
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                {{-- Formulario con las opciones de descuento --}}
                                <form method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Select the desired discount for your
                                                new {{ config('app.name', 'code') }}:</label>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="input-group">
                                                <select name="discount" title="Choose any discount available."
                                                        class="custom-select" required>
                                                    <option value="20">20% Off</option>
                                                    <option value="30">30% Off</option>
                                                    <option value="40">40% Off</option>
                                                </select>

                                                <button type="submit"
                                                        class="btn btn-success">{{ __("Generate!") }}</button>
                                            </div>
                                        </div>
                                    </div>

                                    @if (isset($code))
                                        <div class="row">
                                            <div class="col-sm-4 offset-sm-4 text-center">
                                                <br>
                                                <label for="code"><b>Your new {{ config('app.name', 'code') }} is: </b></label>
                                                <input type="text" class="form-control form-inline fondo-code-lg"
                                                       name="code"
                                                       value="{{ $code }}"
                                                       title="Copy this new {{ config('app.name', 'code') }}!" readonly>
                                            </div>
                                        </div>
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
