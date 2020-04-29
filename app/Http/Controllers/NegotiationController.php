<?php

namespace App\Http\Controllers;

use App\Project;
use App\State;
use App\User;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegotiationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->authorizeResource(Project::class, 'negotiation');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('viewAnyNegotiation', Project::class);

        $user_id = Auth::id();

        $negotiations = Project::where('negotiator_id', $user_id)->latest()->get();
        $states = State::All();
        return view('negotiations.index', compact('negotiations', 'states'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $negotiation)
    {
        $states = State::All();
        $files = File::where('project_id', $negotiation->id)->get();
        // $files = $negotiation->files();
        return view('negotiations.show', compact('negotiation', 'states', 'files'));
    }
}
