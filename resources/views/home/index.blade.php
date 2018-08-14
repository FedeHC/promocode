@extends('layouts.home')

@section('contain')
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
                <a href="{{ route('addcode') }}" class="btn btn-outline-success btn-lg">New Code</a>
                <a href="{{ route('checkcode') }}" class="btn btn-outline-success btn-lg">Check Code</a>
                <a href="{{ route('codelist') }}" class="btn btn-outline-success btn-lg">Code List</a>
            @endif
        </div>
    </section>
@endsection