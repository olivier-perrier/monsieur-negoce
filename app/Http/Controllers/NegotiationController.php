<?php

namespace App\Http\Controllers;

use App\Project;
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
        $user_id = Auth::id() || 1;

        $negotiations = Project::where('negotiator_id', $user_id)->latest()->get();
        return view('negotiations.index', compact('negotiations'));
    }
}
