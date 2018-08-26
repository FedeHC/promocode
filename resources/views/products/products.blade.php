@extends('layouts.app')

@section('title', ' - Code list')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br><br>

                <div class="card">
                    <div class="card-header">
                        {{ __('Products list:') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group row mb-0">
                            <div class="col-sm offset-md">

                                <table class="table table-striped table-borderless table-sm">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($lista_productos as $fila)
                                        <tr>
                                            <td>{{ $fila->id }}</td>
                                            <td><b>{{ $fila->name }}</b></td>
                                            <td>{{ $fila->precio }}</td>
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

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="add_product">Product name</label>
                                    <input type="text" class="form-control" id="add_product" placeholder="Enter name" name="product_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="add_value">Product value</label>
                                        <input type="text" class="form-control" id="add_value" placeholder="Enter value" name="product_value">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Confirm</button>
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