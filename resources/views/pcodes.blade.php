@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        {{ __('Mostrando todos los códigos:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                <ul class="list-group list-group-flush">
                                    @foreach ($la_base_de_datos as $code)
                                        <li class="list-group-item">{{ $code }}</li>
                                    @endforeach
                                </ul>

                                <br>
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
