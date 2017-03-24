<?php

namespace App\Http\Controllers\front\account;

use App\Project;
use App\User;
use Golonka\BBCode\BBCodeParser;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Validator;

class ProjectController extends Controller
{
    private $page = [
        'title' => 'Упрвление проектами',
        'top_info' => 'Ваши проеты',
    ];
    private $redirectTo = '/home/project/';

    public function __construct()
    {
        $this->middleware('auth');
    }

    private function prepareProjectInput(Request $request, Project $project) {
        $bb_parser = new BBCodeParser();

        $project->title = $request->title;
        $project->description = $bb_parser->parse($request->description, true);
        $project->adress = $request->adress;
        $phone = implode(',', $request->phone);
        $project->phone = $phone;

        return $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $user_projects = User::find($user_id)->projects;

        return view('front.account.project_list',
            [
                'page' => $this->page,
                'projects' => $user_projects,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.account.project_create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|unique:projects',
            'description'   => 'required',
            'adress'        => 'required',
            'phone'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo.'create')
                ->withInput()
                ->withErrors($validator);
        }

        $project = new Project;
        $project = $this->prepareProjectInput($request, $project);

        $user_id = Auth::id();
        $user = User::find($user_id);
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
        $project = Project::find($id);
        return view('front.account.project_create', [
            'project' => $project,
        ]);
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
        $validator = Validator::make($request->all(), [
            'title'         => 'required|unique:projects,title, '.$id,
            'description'   => 'required',
            'adress'        => 'required',
            'phone'         => 'required',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo.$id)
                ->withInput()
                ->withErrors($validator);
        }

        $project = Project::find($id);
        $project = $this->prepareProjectInput($request, $project);

        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->projects()->save($project);

        return redirect($this->redirectTo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return redirect($this->redirectTo);
    }
}
