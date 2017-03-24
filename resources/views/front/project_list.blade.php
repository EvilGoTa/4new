@extends('layouts.app')

@section('pagebutton')
    @include('common.pagebuttonAddProject')
@endsection

@section('submenu')
    <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ $sortName or 'Новые' }} <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('project_list_sort') }}">Новые</a></li>
                <li><a href="{{ route('project_list_sort', ['sort' => 'top-today']) }}">Топ за сегодня</a></li>
                <li><a href="{{ route('project_list_sort', ['sort' => 'top-month']) }}">Топ за месяц</a></li>
                <li><a href="{{ route('project_list_sort', ['sort' => 'top-alltime']) }}">Топ за всё время</a></li>
            </ul>
        </li>
    </ul>
@endsection

@section('content')
        <!-- works -->
<div id="projects"  class="row projects-grid row-list-fix">
    @if (count($projects))
    @foreach($projects as $key => $p)
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="project-card" style="background-image: url({{ $p->title_image or '/theme/images/portfolio/6.jpg' }}); background-color: #777; background-position: center center; background-repeat: no-repeat; background-size: cover">
                <div class="project-content">
                    <h2>
                        <a href="{{ route('project_show', $p->id) }}"
                           title="{{ $p->brief_description }}">
                            {{ $p->title }}
                        </a>
                    </h2>
                    <p>
                        {{ $p->brief_description or "" }}
                    </p>
                </div>
                <div class="project-rating">
                    <div class="pull-left">{{ $p->getRating() }}</div>
                    <div class="pull-right">
                        @if (Auth::user())
                            <a href="{{ route('project_rate', ['project' => $p->id, 'updown' => 'up']) }}">
                                <i class="fa fa-caret-up" aria-hidden="true"></i>
                                {{ number_format(Auth::user()->role()->first()->rating_plus) }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <div class="col-xs-10 col-xs-offset-1">
            <p class="hero">Проектов нет</p>
        </div>
    @endif
</div>
<!-- works -->
    {{-- старая версия
    <style>
        .row .project-thumb {
            margin-left: 10px;
            margin-bottom: 10px;
            padding: 5px;
        }
        .row .project-thumb:first-child {
            margin-left: 0px;
        }
        .project-thumb {
            border: 2px solid #E9E9E9;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                @foreach($projects as $key => $p)
                    @if($key % 4 == 0 && $key > 0)
                        </div>
                        <div class="row">
                    @endif
                    <div class="col-md-3">
                        <div class="project-thumb">
                            <a href="{{ route('project_show', $p->id) }}">{{ $p->title }}</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    --}}
@endsection