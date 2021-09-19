<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Mind Money</a>
            <div class="d-flex" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                        </li>--}}

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.profile') }}">Профиль</a></li>
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Категории</a></li>
                                <li><a class="dropdown-item" href="{{ route('finance.index') }}">Расходы/доходы</a></li>
                                <li><a class="dropdown-item" href="{{ route('settings.index') }}">Настройки</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('user.logout') }}">Выйти</a></li>
                            </ul>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('user.create') }}">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('user.loginForm') }}">Войти</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
