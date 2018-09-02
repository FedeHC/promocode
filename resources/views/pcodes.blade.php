@extends('layouts.app')

@section('title', ' - Code list')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        Code list:
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                @if(isset($promocodes) && isset($hoy))
                                    <table class="table table-striped table-borderless table-sm">
                                        <thead>
                                        <tr class="table-secondary">
                                            <th scope="col">ID</th>
                                            <th scope="col">Codes</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Expires</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($promocodes as $fila)
                                            <tr>
                                                {{-- Id --}}
                                                <td>{{ $fila->id }}</td>

                                                {{-- Codes--}}
                                                <td><span class="fondo-code-sm">{{ $fila->code }}</span></td>

                                                {{-- Status --}}
                                                <td>
                                                    @if(new DateTime($fila->expires_at) <= $hoy)
                                                        <span class="badge badge-warning">Expired</span>
                                                    @elseif($fila->promocode_id == $fila->id)
                                                        <span class="badge badge-secondary">Used</span>
                                                    @else
                                                        <span class="badge badge-success">Available</span>
                                                    @endif
                                                </td>

                                                {{-- Discount --}}
                                                <td>{{ $fila->reward }}<span class="small">%</span></td>

                                                {{-- Expiration --}}
                                                @if($fila->expires_at == "")
                                                    <i>No expiration date</i>
                                                @else
                                                    <td>{{ $fila->expires_at }}</td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif

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
