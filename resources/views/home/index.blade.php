@extends('layouts.app')

@section('title', ' - Home')

@section('content')
    <br><br>

    <div class="container-fluid">
        <section class="jumbotron text-center">

            <h1 class="jumbotron-heading">Welcome

                {{-- Mensaje como invitado: --}}
                @guest
                    {{ "Stranger" }}

                {{-- Mensaje como usuario logueado: --}}
                @else
                    back {{ Auth::user()->name }}!
                @endif
            </h1>

            {{-- Invitado: --}}
            @guest
                <p class="lead text-muted"> Register or Log in if you want to get a Promocodes!</p>
                <p class="lead text-muted"> Go ahead, it's free! </p>

                <a href="{{ route('login') }}" class="btn btn-outline-success btn-lg">Log in</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>


            {{-- Usuario: --}}
            @else
                <p class="lead text-muted"> We are happy to have you back! Have a good stay on our page.</p>

                @role('super-admin')
                <a href="{{ route('addcode') }}" class="btn btn-outline-success btn-lg">New Code</a>
                @endrole

                @hasanyrole('super-admin|moderator|editor')
                <a href="{{ route('codelist') }}" class="btn btn-outline-success btn-lg">Code List</a>
                @endhasanyrole

                <a href="{{ route('checkcode') }}" class="btn btn-outline-success btn-lg">Check Code</a>
                <a href="{{ route('shopcart') }}" class="btn btn-outline-primary btn-lg">Shop Cart</a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg">Product List</a>
            @endif

        </section>
    </div>
@endsection
