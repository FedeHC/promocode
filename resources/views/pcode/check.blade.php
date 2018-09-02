@extends('layouts.app')

@section('title', ' - Check code')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        Check code:
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                {{-- FORMULARIO --}}
                                <form method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-group has-warning">
                                                <input type="text" name="promocode" class="form-control text-left"
                                                       value="@if(isset($code)){{ $code }}@endif"
                                                       title="Insert here the {{ config('app.name', 'code') }} to check."
                                                       required/>
                                                <button type="submit" class="btn btn-success">Check!</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- MENSAJE --}}
                                    @if(isset($code) && isset($status))
                                        <div class="row">
                                            <div class="col-lg-6">
                                                @if($status === true)
                                                    <h1 class="badge badge-success mensaje-code">↪️ This code is valid</h1>
                                                @elseif($status === false)
                                                    <h1 class="badge badge-warning mensaje-code">↪️ This code has expired.</h1>
                                                @elseif($status === 'invalid')
                                                    <h1 class="badge badge-danger mensaje-code">↪️ Invalid code.</h1>
                                                @endif
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
