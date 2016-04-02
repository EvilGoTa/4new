@extends('layouts.admin')

@section('content')
        <!-- Bootstrap Boilerplate... -->
<h1 class="page-header">{{ $top_header }}</h1>
<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <form action="{{ url('admin/users') }}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}
        {!! method_field('PATCH') !!}

        <input type="hidden" name="edit_user_id" value="{{ $user->id }}">

        <div class="form-group">
            <label for="firstname" class="col-sm-3 control-label">Имя</label>

            <div class="col-sm-6">
                <input type="text" name="firstname" id="user-firstname" class="form-control" value="{{ $user->first_name or ""}}">
            </div>
        </div>
        <div class="form-group">
            <label for="secondname" class="col-sm-3 control-label">Фамилия</label>

            <div class="col-sm-6">
                <input type="text" name="secondname" id="user-secondname" class="form-control" value="{{ $user->second_name or "" }}">
            </div>
        </div>
        <div class="form-group">
            <label for="alias" class="col-sm-3 control-label">Псевдоним</label>

            <div class="col-sm-6">
                <input type="text" name="alias" id="user-alias" class="form-control" value="{{ $user->alias or "" }}">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">E-mail</label>

            <div class="col-sm-6">
                <input type="email" name="email" id="user-email" class="form-control" value="{{ $user->email or "" }}">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Пароль</label>

            <div class="col-sm-6">
                <input type="text" name="password" id="user-password" class="form-control"
                       @if ($user->password)
                       disabled
                       @endif
                >
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-3 control-label">Группа</label>

            <div class="col-sm-6">
                <select name="role" id="user-role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                                @if ($role->id == $user->role()->first()->id)
                                selected
                                @endif
                        >{{ $role->name }}</option>
                    @endforeach
                </select>
                {{--<input type="role" name="role" id="user-email" class="form-control">--}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-pencil"></i> Сохранить
                </button>
            </div>
        </div>
    </form>


</div>

@endsection