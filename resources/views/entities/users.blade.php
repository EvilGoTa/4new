@extends('layouts.admin')

@section('content')
        <!-- Bootstrap Boilerplate... -->
<h1 class="page-header">{{ $top_header }}</h1>
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

            <!-- New User Form -->
    <form action="{{ url('admin/users') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">Имя</label>

            <div class="col-sm-6">
                <input type="text" name="firstname" id="user-firstname" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="secondname" class="col-sm-3 control-label">Фамилия</label>

            <div class="col-sm-6">
                <input type="text" name="secondname" id="user-secondname" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="alias" class="col-sm-3 control-label">Псевдоним</label>

            <div class="col-sm-6">
                <input type="text" name="alias" id="user-alias" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">E-mail</label>

            <div class="col-sm-6">
                <input type="email" name="email" id="user-email" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Пароль</label>

            <div class="col-sm-6">
                <input type="text" name="password" id="user-password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-3 control-label">Группа</label>

            <div class="col-sm-6">
                <select name="role" id="user-role" class="form-control">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                {{--<input type="role" name="role" id="user-email" class="form-control">--}}
            </div>
        </div>


        <!-- Add User Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить пользователя
                </button>
            </div>
        </div>
    </form>

    @if (count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Существующие пользователи
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Псевдоним</th>
                    <th>E-mail</th>
                    <th>Группа</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $user->first_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $user->second_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $user->alias }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $user->email }}</div>
                            </td>
                            <td class="table-text">
                                <div>
                                    <ul>
                                    @foreach ($user->role as $r)
                                         <li>{{ $r->name }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            </td>

                            <td>
                                <form action="{{ url('admin/users/edit/'.$user->id) }}" method="GET" style="float: left">
                                    {!! csrf_field() !!}

                                    <button type="submit" class="btn btn-default" title="Редактировать">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </form>

                                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}

                                    <button type="submit" class="btn btn-default" title="Уалить">
                                        <i class="fa fa-minus"></i>
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