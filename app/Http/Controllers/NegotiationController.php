<?php

namespace App\Http\Controllers;

use App\Project;
use App\State;
use App\User;
use App\File;
use App\Meta;
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
    public function index()
    {
        $user_id = Auth::id();

        $negotiations = Project::where('negotiator_id', $user_id)->latest()->get();
        $states = State::All();
        return view('negotiations.index', compact('negotiations', 'states'));
    }

}
