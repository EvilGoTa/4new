@extends('layouts.admin')

@section('content')
    <h1 class="page-header">{{ $top_header or 'Заголовок' }}
        <a href="/admin/projects/create" class="btn btn-lg btn-success" style="float: right">
            <i class="fa fa-plus"></i> Добавить
        </a>
    </h1>
    {{--<div class="panel-body">--}}
        @if(count($projects))
            <table class="table table-striped task-table">
                <thead>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Создан</th>
                    <th>Действия</th>
                </thead>
                <tbody>
                    @foreach($projects as $p)
                        <tr>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->author->alias }}</td>
                            <td>{{ $p->created_at }}</td>
                            <td class="actions">
                                <form action="{{ route('admin.projects.edit', ['projects' => $p->id]) }}" method="GET">
                                    {!! csrf_field() !!}

                                    <button type="submit" class="btn btn-default" title="Редактировать">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.projects.destroy', ['projects' => $p->id]) }}" method="GET">
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
                <strong>Ничего нет!</strong> Не найдено ниодного проекта.
            </div>
        @endif
    {{--</div>--}}
@endsection