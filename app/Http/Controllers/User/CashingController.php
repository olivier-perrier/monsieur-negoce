<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\Admin\CashingAsked as AdminCashingAsked;
use App\Mail\Nego\CashingAsked;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CashingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        $this->authorize('ownerOrAdmin', $user->id);

        $projects = Project::where('negotiator_id', $user->id)->latest()->get();
        $cashings = $user->cashings;

        return view('users.cashings.index', [
            'user' => $user,
            'projects' => $projects,
            'cashings' => $cashings,
        ]);
    }

    /**
     * Demande d'encaissement par le négociateur
     */
    function payment(Request $request, User $user)
    {

        $this->authorize('ownerOrAdmin', $user->id);


        Mail::to($user)->send(new CashingAsked($user));

        Mail::to(User::get_administrators())->send(new AdminCashingAsked($user));


        $request->session()->flash('notification_cashing', "Votre demande de versement a bien été recue");

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 
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
