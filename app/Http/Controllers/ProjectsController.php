<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){


        // $projects = Project::where('owner_id',auth()->id())->get();
        return view('projects.index',[
            'projects'=> auth()->user()->projects
        ]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(){


        $validatedAttributes = $this->validateProject();

        $validatedAttributes['owner_id'] = auth()->id();

        $project = Project::create($validatedAttributes);

        // event(new ProjectCreated($project));


        // $project = new Project();
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();
        return redirect('/projects');
    }

    public function show(Project $project){
        // $project = Project::findOrFail($id);
        // $twitter = app('twitter');
        // dd($twitter);

        // abort_if($project->owner_id !== auth()->id(),403);
        $this->authorize('update',$project);

        return view('projects.show',compact('project'));
    }

    public function edit($id){
        $project = Project::findOrFail($id);
        return view('projects.edit',['project' => $project]);
    }

    public function update(Project $project){

        $this->authorize('update',$project);

        $project->update($this->validateProject());
        return redirect('/projects');
    }

    public function destroy($id){
        Project::findOrFail($id)->delete();
        return redirect('/projects');
    }

    protected function validateProject(){
        return request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:5']
        ]);
    }
}
