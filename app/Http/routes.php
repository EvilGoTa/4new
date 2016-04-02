<?php

use App\Role;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //main page
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/project', 'ProjectsController@front_list');
});

/* Auth */

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::resource('/home/project', 'front\account\ProjectController');
});

/* Admin panel routes */

Route::group(['middleware' => ['web', 'admin'], 'prefix' => 'admin'], function() {
    Route::get('dashboard', ['as' => 'dashboard', function() {
        return view('admin.dashboard', ['top_header' => 'Общая статистика', 'active_tab' => 'dashboard']);
    }]);

    // list of roles
    Route::get('/roles', 'RoleController@index');
    // add a role
    Route::post('/roles', 'RoleController@store');
    // delete role
    Route::delete('/roles/{role}', 'RoleController@destroy');

    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route::delete('/users/{user}', 'UserController@destroy');
    Route::patch('/users', 'UserController@update');
    Route::get('users/edit/{user}', 'UserController@edit');

    Route::resource('projects', 'ProjectsController');
});
