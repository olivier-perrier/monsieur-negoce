<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use App\State;
use App\Address;
use App\User;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $projects = Project::where('client_id', $user_id)->latest()->get();

        return view('projects.index', [
            'projects' => $projects,
            'states' => State::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        return view('projects.create', [
            'categories' => Category::All()
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

        $validatedAttributes = request()->validate([
            'name' => ['required'],
            'category' => 'required',
            'description' => 'required',
            'address.company_name' => ['required'],
            'address.person_name' => 'required',
            'address.street' => 'required',
            'address.postcode' => 'required',
            'address.city' => 'required',
            'address.email' => 'required',
            'address.phone' => 'required',
        ]);

        $address = new Address($request->get('address'));
        $address->save();

        $project = new Project($validatedAttributes);
        $project->client_id = Auth::id();
        $project->state_id = 1;
        $project->category_id =  request('category');
        $project->contactAddress()->associate($address);
        $project->save();

        // Project::create($project);

        return redirect(route('projects.show', $project->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $states = State::All();
        $files = $project->files()->get();
        return view('projects.show', compact('project', 'states', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
