<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $projects = Project::orderBy('created_at', 'asc')->get();

        return view('entities.projects', [
            'projects' => $projects
        ]);
    }

    public function store(Request $req) {
        $validator = Validator::make($req->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $project = new Project;
        $project->name = $req->name;
        $project->text = $req->text;
        $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project) {
        $project->delete();

        return redirect('/projects');
    }
}
