<?php

namespace App\Http\Controllers;

use Request;

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

    private function setReturn($data, $template, $template_data) {
        if (Request::ajax()) {
            return Response::json($data);
        } else {
            return view($template, $template_data);
        }
    }

    public function frontList() {
        $projects = Project::orderBy('created_at', 'asc')->get();

        $view_data = ['projects' => $projects];
        return $this->setReturn($projects, 'front.project_list', $view_data);
    }

    public function frontShow($id) {
        $project = Project::find($id);
        $view_data = ['project' => $project];

        return $this->setReturn($project, 'front.project_show', $view_data);
    }
}
