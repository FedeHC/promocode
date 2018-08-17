@extends('layouts.home')

@section('title', ' - Home')

@section('content')
    <br><br>

    <section class="jumbotron text-center">
        <div class="container">

            <h1 class="jumbotron-heading">
                Welcome
                @guest
                    {{ "Stranger" }}
                @else
                    @php
                        echo " back ".@Auth::user()->name."!"
                    @endphp
                @endif
            </h1>

            @guest
                <p class="lead text-muted"> Register or Log in if you want to get a Promocodes!</p>
                <p class="lead text-muted"> Go ahead, it's free! </p>
                <a href="{{ route('login') }}" class="btn btn-outline-success btn-lg">Log in</a>
                <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg">Register</a>
            @else
                <p class="lead text-muted"> We are happy to have you back! Have a good stay on our page.</p>
                <a href="{{ route('addcode') }}" class="btn btn-outline-primary btn-lg">New Code</a>
                <a href="{{ route('checkcode') }}" class="btn btn-outline-primary btn-lg">Check Code</a>
                <a href="{{ route('codelist') }}" class="btn btn-outline-primary btn-lg">Code List</a>
                <a href="{{ route('shopcart') }}" class="btn btn-outline-primary btn-lg">Shop Cart</a>
                <a href="{{ route('products') }}" class="btn btn-outline-primary btn-lg">Products</a>
            @endif
        </div>
    </section>
@endsection