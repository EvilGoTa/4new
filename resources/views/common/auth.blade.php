@if (Auth::guest())
    <li><a href="{{ url('/login') }}">Login</a></li>
    <li><a href="{{ url('/register') }}">Register</a></li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->first_name }} <i class="fa fa-chevron-down" aria-hidden="true"></i>
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