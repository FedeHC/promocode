@extends('layouts.app')

@section('title', ' - Generate code')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        {{ __('Generate code:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">
                                <h4>Select the desired discount. By default the value is 20%</h4>

                                {{-- Botón volver --}}
                                <form method="post">
                                    @csrf

                                    <br>
                                    <input type="radio" name="discount" value="20disc" checked>20% Off
                                    <input type="radio" name="discount" value="30disc">30% Off
                                    <input type="radio" name="discount" value="40disc">40% Off
                                    <br>
                                   
                                    @if (isset($code))
                                        <div class="form-inline">
                                            <label for="code">Your promocode is :  </label>  
                                            <input type="text" class="form-control" name="code" value="{{ $code }}"
                                                   readonly>
                                        </div>
                                        <br>
                                    @endif

                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Generate promocode") }}
                                    </button>
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
