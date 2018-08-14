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

                                <form method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-success">
                                        {{ __("Generar PromoCODE") }}
                                    </button>

                                    @if (isset($code))
                                        {{ $code }}
                                    @endif

                                    <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
                                        {{ __('Volver')}}</a>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
