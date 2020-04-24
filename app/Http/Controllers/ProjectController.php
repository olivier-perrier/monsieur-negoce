<?php

namespace App\Http\Controllers;

use App\Category;
use App\Project;
use App\State;
use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id() | 1;

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
        ]);

        $validatedAttributes = request()->validate([
            'address_company_name' => ['required'],
            'address_person_name' => 'required',
            'address_street' => 'required',
            'address_postcode' => 'required',
            'address_city' => 'required',
            'address_email' => 'required',
            'address_phone' => 'required',
        ]);

        $address = new Address([
            'company_name' => request('address_company_name'),
            'person_name' => request('address_person_name'),
            'street' => request('address_street'),
            'postcode' => request('address_postcode'),
            'city' => request('address_city'),
            'email' => request('address_email'),
            'phone' => request('address_phone'),
        ]);

        $address->save();


        $project = new Project(request(['name', 'description']));
        $project->client_id = Auth::id() || 1;
        $project->category_id = request('category');
        $project->state_id = 1;
        $project->address_contact_id = $address->id;
        $project->save();

        // Uniquement pour le relation multiples dans les deux sens ?
        // $project->category()->attach(request('category_id'));

        // Project::create($project);

        return redirect(route('projects.index'));
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
        return view('projects.show', compact('project', 'states'));
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
