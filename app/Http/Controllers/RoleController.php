<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Http\Controllers\Controller;
use Validator;

class RoleController extends Controller
{
    protected $redirectTo = '/admin/roles';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $roles = Role::orderBy('created_at', 'asc')->get();

        return view('entities.roles', [
            'roles' => $roles,
            'top_header' => 'Группы = роли',
            'active_tab' => 'roles',
        ]);
    }

    public function store(Request $req) {
        $validator = Validator::make($req->all(), [
            'name' => 'required|max:255',
            'rating_plus' => 'integer',
            'rating_minus' => 'integer',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo)
                ->withInput()
                ->withErrors($validator);
        }

        $role = new Role;
        $role->name = $req->name;
        $role->rating_plus = $req->rating_plus;
        $role->rating_minus = $req->rating_minus;
        $role->save();

        return redirect($this->redirectTo);
    }

    public function destroy(Role $role) {
        $role->delete();

        return redirect($this->redirectTo);
    }
}
