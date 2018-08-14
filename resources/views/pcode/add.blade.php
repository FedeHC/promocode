@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        {{ __('Agregar código:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">
                            <h4>Select the desired discount. By default the value is 20%</h4>
                                <form method="post">
                                    @csrf
                                    <br>
                                    <input type="radio" name="descuento" value="20desc" checked>20% de descuento
                                    
                                    <input type="radio" name="descuento" value="30desc">30% de descuento
                                    
                                    <input type="radio" name="descuento" value="40desc">40% de descuento
                                    <br>
                                   
                                    @if (isset($code))
                                        <div class="form-inline">
                                            <label for="code">Tu nuevo PromoCODE:  </label>  
                                            <input type="text" class="form-control" name="code" value="{{ $code }}"
                                                   readonly>
                                        </div>
                                        <br>
                                    @endif

                                    <button type="submit" class="btn btn-success">
                                        {{ __("Generar PromoCODE") }}
                                    </button>
                                </form>

                                <br><br>
                                <div class="text-center">
                                    <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
                                        {{ __('Volver')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
