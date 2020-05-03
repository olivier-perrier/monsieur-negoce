<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Notifications\CashingAsked;
use App\Project;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

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
        $projects = Project::where('negotiator_id', $user->id)->latest()->get();

        return view('users.cashings.index', [
            'user' => $user,
            'projects' => $projects
        ]);
    }

    function payment(Request $request, User $user)
    {
        $amount_total_due = $user->amount_total_due();
        $datetime = Carbon::now();

        Notification::send($user, new CashingAsked($user, $amount_total_due, $datetime));
        Notification::send(User::get_administrators(), new CashingAsked($user, $amount_total_due, $datetime));

        $request->session()->flash('notification_cashing', "Un mail viens d'être envoyé avec succès.");
        
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
