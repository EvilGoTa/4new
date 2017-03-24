@extends('layouts.admin')

@section('content')
    <h1 class="page-header">{{ $top_header }}</h1>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ App\User::count() }}</div>
                            <div>Пользователей</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/users">
                    <div class="panel-footer">
                        <span class="pull-left">Подробнее</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ App\Project::count() }}</div>
                            <div>Проектов</div>
                        </div>
                    </div>
                </div>
                <a href="/admin/projects">
                    <div class="panel-footer">
                        <span class="pull-left">Подробнее</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection