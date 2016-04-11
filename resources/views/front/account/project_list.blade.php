@extends('layouts.app')

@section('content')
<style>
    tr form {
        float: left;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page['title'] }}</div>

                <div class="panel-body">
                    <p>{{ $page['top_info'] }}</p>
                    <a href="{{ route('home.project.create') }}">add...</a>
                    @if(count($projects) > 0)
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Название</th>
                            <th>Создан</th>
                            <th>Действия</th>
                            </thead>
                            <tbody>
                            @foreach($projects as $p)
                                <tr>
                                    <td><a href="{{ route('project_show', $p->id) }}">{{ $p->title }}</a></td>
                                    <td>{{ $p->created_at }}</td>
                                    <td class="actions">
                                        <form action="{{-- route('project.show', ['project' => $p->id]) --}}" method="GET">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-default" title="Посмотреть">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('home.project.edit', ['project' => $p->id]) }}" method="GET">
                                            {!! csrf_field() !!}

                                            <button type="submit" class="btn btn-default" title="Редактировать">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('home.project.destroy', ['project' => $p->id]) }}" method="GET">
                                            <button type="submit" class="btn btn-default" title="Удалить">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning" role="alert">
                            <strong>no projects</strong> <a href="{{ route('home.project.create') }}">create</a> one!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection