<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">PromoCodes</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>

{{--<div class="navbar navbar-dark bg-dark shadow-sm">--}}
{{--<div class="container d-flex justify-content-between">--}}
{{--<a href="#" class="navbar-brand d-flex align-items-center">--}}
{{--<strong>PromoCodes</strong>--}}
{{--</a>--}}
{{--<div class="collapse navbar-collapse">--}}
{{--<ul class="navbar-nav mr-auto"></ul>--}}
{{--<ul class="navbar-nav ml-auto">--}}
{{--<li class="nav-item active">--}}
{{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--</li>--}}
{{--<li class="nav-item active">--}}
{{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

