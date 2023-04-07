<div class="header">
    <h1>{{ __('guest.shopname') }}</h1>


    <div class="logres">
        @guest
            <a href="/register" class="btn  default-btn" role="button">{{ __('guest.register') }}</a>
            <a href="/login" class="btn  default-btn" role="button"> {{ __('guest.login') }}</a>

        @endguest
        @auth
            <a href="/logout" class="btn  default-btn" role="button">{{ __('general.Logout') }}</a>
        @endauth
    </div>
</div>

@guest
<nav class="navbar navbar-expand-lg " style="background-color : #FADF54;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{strtoupper(Lang::locale())}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../lang/id">ID</a></li>
                        <li><a class="dropdown-item" href="../lang/en">EN</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endguest

@auth

    <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color : #FADF54;">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav m-auto" style=" font-weight: bold; font-size: 18px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{strtoupper(Lang::locale())}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../lang/id">ID</a></li>
                            <li><a class="dropdown-item" href="../lang/en">EN</a></li>
                        </ul>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="/home">{{ __('general.Home') }} <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">{{ __('general.Cart') }} </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">{{ __('general.Profile') }} </a>
                    </li>
                    @if (Auth::user()->role->name == "Admin")
                    <li class="nav-item">
                        <a class="nav-link" href="/maintenance">{{ __('general.Accmaintenance') }} </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


@endauth
