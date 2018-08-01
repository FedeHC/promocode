@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="row">
        <div class="offset-1 col-md-6 fondo-color">
            <h1>Promocodes data base</h1>
            <br>
            <?php   

                $promos = DB::table('promocodes')->get();
            ?>



            @foreach($promos as $promo)

                <li>
                    {{$promo->code }}
                </li>

            @endforeach
        </div>
    </div>
         


@endsection