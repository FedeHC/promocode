@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Welcome
            @guest
                {{ "Stranger" }}
            @else
                {{ @Auth::user()->name }}
            @endif !</h1>
        </div>
    </div>
@endsection
