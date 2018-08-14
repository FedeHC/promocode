@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        {{ __('Chequear código:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                <form method="post">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" name="code"/>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Chequear!</button>

                                        <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
                                            {{ __('Volver')}}</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
