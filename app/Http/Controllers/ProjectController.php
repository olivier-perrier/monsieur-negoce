<?php

namespace App\Http\Controllers;

use App\Project;
use App\State;
use App\Address;
use App\Cashing;
use App\Mail\Client\ProjectCreated;
use App\Meta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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
        $user = Auth::user();

        $projects = Project::where('client_id', $user->id)->latest()->get();

        return view('projects.index', [
            'projects' => $projects,
            'states' => State::all(),
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
            'categories' => Meta::where('key', 'CATEGORY')->get()
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

        $validation = request()->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'address.company_name' => 'required',
            'address.person_name' => 'required',
            'address.street' => 'required',
            'address.postcode' => 'required',
            'address.city' => 'required',
            'address.email' => 'required|email',
            'address.phone' => 'required',
        ]);


        $address = new Address($request->get('address'));
        $address->save();

        $project = new Project($validation);
        $project->client_id = Auth::id();
        $project->state_id = 1;
        $project->category_id =  request('category');

        $project->contactAddress()->associate($address);

        $project->save();

        /*** Mails ****/
        
        // Envoi un mail à l'utilisateur pour lui confirmer la création de son projet
        Mail::to(Auth::user())->send(new ProjectCreated(Auth::user(), $project));

        // Admin
        Mail::to(User::get_administrators())->send(new ProjectCreated(Auth::user(), $project));


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
        $note_types = Meta::where("key", "NOTE_TYPE")->get();

        return view('projects.show', [
            'project' => $project,
            'states' => State::All(),
            'files' => $project->files,
            'noteTypes' => $note_types,
            'cashing' => $project->cashing
        ]);
    }

}
