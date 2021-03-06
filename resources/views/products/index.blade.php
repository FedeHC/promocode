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
                                </form>
                                <table class="table table-striped table-borderless table-sm">
                                    <thead>
                                    <tr class="table-secondary">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Detail</th>
                                        @role('super-admin')
                                        <th scope="col">Delete</th>
                                        @endrole
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($lista_productos as $fila)
                                        <tr>
                                            <td>{{ $fila->id }}</td>
                                            <td><b>{{ $fila->name }}</b></td>
                                            <td>{{ $fila->value }}</td>
                                            <td>{{ $fila->detail }}</td>
                                            @role('super-admin')
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input position-static" type="checkbox"
                                                           id="blankCheckbox" name="checkbox[]" value="{{$fila->id}}"
                                                           form="delete_form" aria-label="...">
                                                </div>
                                            </td>
                                            @endrole
                                            @can('update product')
                                            <td>
                                                <!-- Button trigger modal modify -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal_Modify_{{$fila->id}}">
                                                    Modify
                                                </button>
                                            </td>
                                            @endcan
                                        </tr>

                                        <!-- Modal Modify -->
                                        <div class="modal fade" id="modal_Modify_{{$fila->id}}" tabindex="-1"
                                             role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" id="mod_form{{$fila->id}}"
                                                          action="{{ route('products.update', $fila) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="mod_product">Product name</label>
                                                                <input type="text" class="form-control" id="mod_product"
                                                                       value="{{ $fila->name }}" name="product_name"
                                                                       form="mod_form{{$fila->id}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mod_value">Product value</label>
                                                                <input type="number" class="form-control" id="mod_value"
                                                                       value="{{ $fila->value }}" name="product_value"
                                                                       form="mod_form{{$fila->id}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mod_detail">Product detail</label>
                                                                <input type="text" class="form-control" id="mod_detail"
                                                                       value="{{ $fila->detail }}" name="product_detail"
                                                                       form="mod_form{{$fila->id}}" required>
                                                            </div>
                                                            <input type="hidden" id="mod_id" value="{{ $fila->id }}"
                                                                   name="product_id" form="mod_form{{$fila->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal" form="mod_form">Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"
                                                                    form="mod_form{{$fila->id}}">Confirm
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Modal end -->
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_Add">
                    Add
                </button>
                @role('super-admin')
                <button type="submit" class="btn btn-primary" form="delete_form">Delete</button>
                @endrole
                <!-- Modal Add -->
                <div class="modal fade" id="modal_Add" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" id="add_form">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="add_product">Product name</label>
                                        <input type="text" class="form-control" id="add_product"
                                               placeholder="Enter name" name="product_name" form="add_form" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="add_value">Product value</label>
                                        <input type="number" class="form-control" id="add_value"
                                               placeholder="Enter value" name="product_value" form="add_form" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="add_detail">Product detail</label>
                                        <input type="text" class="form-control" id="add_detail"
                                               placeholder="Description" name="product_detail" form="add_form" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" form="add_form">Confirm</button>
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