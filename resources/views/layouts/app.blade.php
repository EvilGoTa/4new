<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="/css/common.css">
    <link rel="stylesheet" href="/css/styles.css">

    <style>
        /*@import "http://webfonts.ru/import/arnamu.css";

        body {
            font-family: 'Arian AMU';
        }
        */
    </style>
</head>
<body id="app-layout">
<div class="left-menu hidden-mw" id="menu">
    <div class="close-button">
        <a href="#" class="menu-toggle"><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
    <ul>
        <li ><a href="/">Все</a></li>
        <li ><a href="/project">Проекты</a></li>
        <li ><a href="/blog">Блог</a></li>
        <li ><a href="/service">Услуги</a></li>
        <li ><a href="/job">Вакансии</a></li>
        <li ><a href="/personnel">Кадры</a></li>
    </ul>
</div>
<div class="topbar animated fadeInLeftBig"></div>
<!-- Header Starts -->
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">

                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="/">4new</a>
                    <a class="navbar-brand menu-toggle" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <!-- #Logo Ends -->


                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Nav Starts -->
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li >
                            <a href="#" class="search-toggle">
                                <i class="fa fa-search"></i>
                                <div class="search-box hidden ">
                                    <form style="display: inline" action="/search" method="GET">
                                        <input type="text" name="q">
                                    </form>
                                </div>
                            </a>
                            @push('scripts_bottom')
                            <script>
                                $('.search-toggle').on('click', function() {
                                    $('.search-box').toggleClass('hidden')
                                })
                                $('.search-box input').on('click', function(e) {
                                    e.stopPropagation();
                                })
                            </script>
                            @endpush
                        </li>

                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if (Auth::user()->isAdmin())
                                        <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-btn fa-sign-out"></i>Панель администратора</a></li>
                                    @endif
                                    <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-sign-out"></i>Мой кабинет</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выход</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>


                </div>
                <!-- #Nav Ends -->

            </div>
        </div>

    </div>
</div>
<!-- #Header Starts -->

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/react/react.js"></script>
    <script src="/js/react/react-dom.js"></script>
    <script src="/js/common.js"></script>

    @stack('scripts_bottom')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
