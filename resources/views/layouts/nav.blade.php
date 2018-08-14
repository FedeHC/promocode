<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">

        {{-- El logo copado de nuestra app ;) --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('imagenes/logo.png') }}" width="100"/>
        </a>

        {{-- El botón (si la ventana o navegador se achica) --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Lado izq. del Navbar --}}
            <ul class="navbar-nav mr-auto"></ul>

            {{-- Lado der. del Navbar --}}
            <ul class="navbar-nav ml-auto">

                {{-- COMO INVITADO --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Log in') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </li>

                {{-- COMO USUARIO --}}
                @else
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>
    </div>
</nav>
