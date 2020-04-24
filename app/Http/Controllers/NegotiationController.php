<?php

namespace App\Http\Controllers;

use App\Project;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NegotiationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id() || 2;

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
        return view('negotiations.show', compact('negotiation', 'states'));
    }
}
