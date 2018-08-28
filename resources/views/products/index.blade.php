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
                                <form method="post" id="delete_form" action="{{ route('products.del') }}">
                                    @csrf
                                    @method('DELETE')
                                <table class="table table-striped table-borderless table-sm">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Detail</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($lista_productos as $fila)
                                        <tr>
                                            <td>{{ $fila->id }}</td>
                                            <td><b>{{ $fila->name }}</b></td>
                                            <td>{{ $fila->value }}</td>
                                            <td>{{ $fila->detail }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="checkbox[]" value="{{$fila->id}}" aria-label="...">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </form>
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
                <button type="submit" class="btn btn-primary" form="delete_form">Delete</button>

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
                            <form method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="add_product">Product name</label>
                                        <input type="text" class="form-control" id="add_product" placeholder="Enter name" name="product_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="add_value">Product value</label>
                                        <input type="number" class="form-control" id="add_value" placeholder="Enter value" name="product_value" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="add_detail">Product detail</label>
                                        <input type="text" class="form-control" id="add_detail" placeholder="Description" name="product_detail" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            </form>
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