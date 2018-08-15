@extends('layouts.app')

@section('title', ' - Code list')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        {{ __('Code list:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                <table class="table table-striped table-borderless table-sm">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Expires at</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($la_base_de_datos as $fila)
                                        <tr>
                                            <td>{{ $fila->id }}</td>
                                            <td><b>{{ $fila->code }}</b></td>

                                            @if($fila->expires_at == "")
                                                <td><i>Sin vencimiento</i></td>
                                            @else
                                                <td>{{ $fila->expires_at }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>

                <div class="text-center">
                    <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
                        {{ __('Back')}}</a>
                </div>

            </div>
        </div>
    </div>
@endsection
