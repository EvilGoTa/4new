<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Illuminate\Http\Response;
use Validator;

class ProjectsController extends Controller
{
    private $activeTab = 'projects';
    private $redirectTo = '/admin/projects';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'asc')->get();

        return view('entities.projects', [
            'projects' => $projects,
            'top_header' => 'Проекты',
            'active_tab' => $this->activeTab
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('created_at', 'asc')->get();

        return view('entities.projects_create', [
            'users' => $users,
            'top_header' => 'Новый проект',
            'active_tab' => $this->activeTab
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'title'         => 'required|unique:projects',
            'description'   => 'required',
            'user'          => 'required',
            'adress'        => 'required',
            'phone'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/projects/create')
                ->withInput()
                ->withErrors($validator);
        }



        $project = new Project;
        $project->title = $req->title;
        $project->description = $req->description;
//        $project->adress = $req->adress;
//        $project->phone = $req->phone;
//        $project->user_id = $req->user;
//        $project->save();

        $user = User::find($req->user);
        $user->projects()->save($project);

        return redirect($this->redirectTo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function frontList() {
        $projects = Project::orderBy('created_at', 'asc')->get();

        if (Request::ajax()) {
            return Response::json($projects);
        } else {
            $view_data = [];
            return view('front.project_list', $view_data);
        }
    }
}
