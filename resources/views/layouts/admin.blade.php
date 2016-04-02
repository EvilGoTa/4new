<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>4new Admin panel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="/css/dashboard.css">

    <style>
        @import "http://webfonts.ru/import/arnamu.css";

        body {
            font-family: 'Arian AMU';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}">4new - панель администратора</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Frontend</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Profile</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li @if ($active_tab === 'dashboard') class="active" @endif><a href="/admin/dashboard">Обзор<span class="sr-only">(current)</span></a></li>
                    <li @if ($active_tab === 'projects') class="active" @endif><a href="/admin/projects">Проекты</a></li>
                    <!-- <li><a href="#">Analytics</a></li>
                    <li><a href="#">Export</a></li> -->
                </ul>
                <ul class="nav nav-sidebar">
                    <li @if ($active_tab === 'users') class="active" @endif><a href="/admin/users">Пользователи</a></li>
                    <li @if ($active_tab === 'roles') class="active" @endif><a href="/admin/roles">Группы</a></li>
                    <!-- <li><a href="">Another nav item</a></li> -->
                </ul>
            </div>

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="/js/bootstrap/bootstrap-confirmation.js"></script>
    <script src="/js/dashboard.js"></script>
    @stack('scripts_bottom')
</body>
</html>