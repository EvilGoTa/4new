<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $page_title or 'SQRO.RU' }}</title>

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
    <ul class="nav">
        <li class="visible-xs-block">
            <a href="#" class="search-toggle">
                <i class="fa fa-search"></i>
                <div class="search-box ">
                    <form style="display: inline" action="/search" method="GET">
                        <input type="text" name="q">
                    </form>
                </div>
            </a>
        </li>
        <li ><a href="/">Все</a></li>
        <li ><a href="/project">Проекты</a></li>
        <li ><a href="/blog">Блог</a></li>
        <li ><a href="/service">Услуги</a></li>
        <li ><a href="/job">Вакансии</a></li>
        <li ><a href="/personnel">Кадры</a></li>
        @include('common/auth')
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
                    <a class="navbar-brand" href="/">SQRO.RU</a>
                    <a class="navbar-brand menu-toggle" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    <!-- #Logo Ends -->

                </div>

                <!-- Nav Starts -->
                <div class="hidden-xs">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="projects-counter">
                            <span class="projects-count">
                                {{ \App\Project::all()->count() }}</span><br>
                            проектов
                        </li>
                        <li>
                            <a href="{{ route('home.project.create') }}" class="share share-spec" style="line-height: 1.1em; font-weight: bold">Рассказать о<br>проекте</a>
                        </li>
                        <li >
                            <a href="#" class="search-toggle">
                                <div class="search-box hidden-hover">
                                    <i class="fa fa-search"></i>
                                    <form style="display: inline" action="/search" method="GET">
                                        <input type="text" name="q" placeholder="что ищем?">
                                    </form>
                                </div>
                            </a>
                            @push('scripts_bottom')
                            <script>
                                $('.search-toggle').on('click', function() {
                                    $('.search-box').toggleClass('hidden-hover')
                                })
                                $('.search-box input').on('click', function(e) {
                                    e.stopPropagation();
                                })
                            </script>
                            @endpush
                        </li>

                        @include('common/auth')
                    </ul>


                </div>
                <!-- #Nav Ends -->

            </div>
        </div>
        <div class="nav nav-bar navbar-default submenu head-padded">
            @yield('submenu')
        </div>
    </div>
</div>
@yield('pagebutton')

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
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter42871689 = new Ya.Metrika({ id:42871689, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/42871689" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
</body>
</html>
