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

                                    <div class="input-group">
                                        <input type="text" name="code" class="form-control"
                                               value="@if(isset($code)){{ $code }}@endif"/>
                                        <button type="submit" class="btn btn-success">Chequear!</button>
                                    </div>

                                    @if(isset($mensaje))
                                        <label><b><i>{{ $mensaje }}</i></b></label>
                                    @endif
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
