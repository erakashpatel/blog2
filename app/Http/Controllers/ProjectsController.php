<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
//use Mail;
use Auth;
use App\User;
use App\Events\Projectcreated;
use App\ProjectFilters;
//use App\Mail\ProjectCreated;
class ProjectsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ProjectFilters $filters){
    	
        $projects =  Project::filter($filters)->get();

        // $projects = $user->projects;
        //    auth()->id() // user id
        //    auth()->user()->id // user id
        //    auth()->check()
       // $projects = auth()->user()->projects;
      //  $projects = Project::where('user_id',Auth()->id())->get();
        return view('projects.index',['projects' => $projects]);
    }
    public function create(){
    	return view('projects.create');
    }
    public function store(Request $request,Project $project){

        $validatedData = $request->validate([
	        'title' => 'required|max:255|min:3',
	        'description' => 'required|max:255|min:3',
            'duration' => 'required',
            'difficulty' => 'required',
	    ]);
	    $validatedData['user_id'] = Auth::user()->id;
        $project = Project::create($validatedData);
    	// $created_project = Project::create($validatedData);
        // Mail::to($created_project->user->email)->send(
        //     new ProjectCreated($created_project)
        // );
        event(new Projectcreated($project));
    	return redirect('/projects');
    }
    public function edit(Project $project){
        //  abort_if($project->user_id !== Auth()->id(), 403);
         // abort_unless
         $this->authorize('update',$project);
        //  abort_if(\Gate::denies('view',$project),403);
        // abort_unless(\Gate::allows('view',$project),403);
         // if(\Gate::denies('view',$project)){
         //    abort(403);
         // }
        //abort_if(auth()->user()->owns($project),403);
		return view('projects.edit',['project' => $project]);
    }
    public function show(Project $project){
        
        //abort_if($project->user_id !== Auth()->id(), 403);
       $this->authorize('update',$project);
        // abort_unless(\Gate::allows('view',$project),403);
        //  abort_if(\Gate::denies('view',$project),403);
        // if(\Gate::denies('view',$project)){
        //     abort(403);
        //  }
        //  abort_if(auth()->user()->owns($project),403);
    	return view('projects.show',['project' => $project]);
    }
    public function update(Request $request,Project $project){

        $this->authorize('update',$project);

        $validatedData = $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3',
            'duration' => 'required',
            'difficulty' => 'required',
        ]);

	    $validatedData['user_id'] = Auth::user()->id;
	    $project->update($validatedData);
    return redirect('/projects');
    }
    public function destroy(Project $project){

        $this->authorize('update',$project);
    	$project->delete();
    	return redirect('/projects');	
    }
}
