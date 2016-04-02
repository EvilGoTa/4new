@extends('layouts.admin')

@section('content')
        <!-- Bootstrap Boilerplate... -->
<h1 class="page-header">{{ $top_header }}</h1>
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

            <!-- New Task Form -->
    <form action="{{ url('admin/roles') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

                <!-- Task Name -->
        <div class="form-group">
            <label for="role" class="col-sm-3 control-label">Название роли</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="role-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-3 control-label">Величина +</label>

            <div class="col-sm-6">
                <input type="text" name="rating_plus" id="role-rating_plus" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-3 control-label">Величина -</label>

            <div class="col-sm-6">
                <input type="text" name="rating_minus" id="role-rating_minus" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить роль
                </button>
            </div>
        </div>
    </form>

    @if (count($roles) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Существующие роли
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Роль</th>
                    <th>Величина +</th>
                    <th>Величина -</th>
                    <th>Действия</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $role->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $role->rating_plus }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $role->rating_minus }}</div>
                            </td>

                            <td>
                                <form action="{{ url('roles/'.$role->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}

                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-minus"></i> Уалить роль
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<!-- TODO: Current Tasks -->
@endsection