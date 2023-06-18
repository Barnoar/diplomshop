<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/jquery.nice-number.min.css">
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    @yield('custom_css')
    <!-- Scripts -->
    @vite(['resources/js/app.js'])

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <div class="header___top-nav">
                        <a class="header__top-link" href="/">Главная</a>
                        <a class="header__top-link" href="{{route('categories.index')}}">Категории</a>
                        <a class="header__top-link" href="{{ route('products.index') }}">Товары</a>
                    </div>
                </ul>

                <!-- Right Side Of Navbar -->
                @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                </ul>
                @endguest

                @auth
                <li class="nav navbar-nav navbar-right nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Администратор
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
            </div>
        </div>
    </nav>
</div>    

    <div class="py-4">
        <div class="card-body">
            @yield('content')            
        </div>
    </div>

<footer class="footer">
    <div class="container-xl">
        <div class="footer__inner">
            <div class="row">
                <div class="col-xl-2">
                    <div class="header__content-logoWrapper">
                        <a class="header__content-logoLink footer__logo-link" href="#!">
                            <img class="header__content-logo" src="/img/logo2.png" alt="Logo">
                        </a>
                        <p class="footer__logo-text">Интернет-магазин музыкальных инструменов</p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <div class="footer__link-store">
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a class="footer__list-link" href="#!">О нас</a>
                            </li>
                            <li class="footer__list-item">
                                <a class="footer__list-link" href="#!">Контакты</a>
                            </li>
                            <li class="footer__list-item">
                                <a class="footer__list-link" href="#!">Услуги и сервис</a>
                            </li>
                            <li class="footer__list-item">
                                <a class="footer__list-link" href="#!">Оплата и доставка</a>
                            </li>
                            <li class="footer__list-item">
                                <a class="footer__list-link" href="#!">Категории</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4 col-xl-3">
                    <div class="footer__waysToPay">
                        <h4 class="footer__waysToPay-title">Cпособы оплаты</h4>
                        <div class="footer__payments">
                            <ul>
                                <li>
                                    <img class="footer__payment-icon" src="./img/footer-payme.png" alt="">
                                </li>
                                <li>
                                    <img class="footer__payment-icon" src="./img/footer-visa.png" alt="">
                                </li>
                                <li>
                                    <img class="footer__payment-icon" src="./img/footer-master.png" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer__socials">
                        <h4 class="footer__socials-title">Социальные сети</h4>
                        <div class="footer__socials-store">
                            <a class="footer__socials-link" href="#!">
                                <i class="fa fa-vk" aria-hidden="true"></i>
                            </a>
                            <a class="footer__socials-link" href="#!">
                                <i class="fa fa-telegram" aria-hidden="true"></i>
                            </a>
                            <a class="footer__socials-link" href="#!">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    
</body>
</html>