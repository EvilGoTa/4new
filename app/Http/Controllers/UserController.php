<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Validator;

class UserController extends Controller
{
    protected $redirectTo = '/admin/users';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::orderBy('created_at', 'asc')->get();
        $roles = Role::orderBy('created_at', 'asc')->get();

        return view('entities.users', [
            'users' => $users,
            'roles' => $roles,
            'top_header' => 'Пользователи',
            'active_tab' => 'users',
        ]);
    }

    public function store(Request $req) {
        $validator = Validator::make($req->all(), [
            'firstname' => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo)
                ->withInput()
                ->withErrors($validator);
        }

        $user = new User;
        $user->first_name   = $req->firstname;
        $user->second_name  = $req->secondname;
        $user->alias        = $req->alias;
        $user->email        = $req->email;
        $user->password     = bcrypt($req->password);
        $user->save();

        $role = Role::find($req->role);
        $user->role()->attach($role->id);

        return redirect($this->redirectTo);
    }

    public function edit(User $user) {
        $roles = Role::orderBy('created_at', 'asc')->get();

        return view('entities.users_edit', [
            'user' => $user,
            'roles' => $roles,
            'top_header' => 'Редактирование пользователя #' . $user->id,
            'active_tab' => 'users',
        ]);
    }

    public function update(Request $req) {
        $validator = Validator::make($req->all(), [
            'firstname' => 'required|max:255',
            'email'     => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo . '/edit/' . $req->edit_user_id)
                ->withInput()
                ->withErrors($validator);
        }

        $user = User::find($req->edit_user_id);
        $user->first_name   = $req->firstname;
        $user->second_name  = $req->secondname;
        $user->alias        = $req->alias;
        $user->email        = $req->email;
        $user->save();

        $role = Role::find($req->role);
        $user->role()->sync([$role->id]);

        return redirect($this->redirectTo);
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect($this->redirectTo);
    }
}
