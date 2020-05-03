<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\AssociationAdded;
use App\Notifications\ProjectStateChanged;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ProjectController extends Controller
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
    public function index()
    {
        $this->authorize('admin');

        return view('admin.projects.index', [
            'projects' => Project::all(),
            'negotiators' => User::where('role', 'negotiator')->get(),
        ]);
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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
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
        // dd($request);

        // Todo validation

        $project->update([
            'state_id' => request('state'),
            'amount_negotiated' => request('amount_negotiated'),
            'fee_negotiator_pourcent' => request('fee_negotiator_pourcent'),
        ]);

        $project->save();

        /*** Notifications ***/

        //  Si l'état du projet à changé
        if ($project->wasChanged('state_id')){
         
            Notification::send([$project->client, $project->negotiator], new ProjectStateChanged($project));
         
            $request->session()->flash('notification_state', "L'vancement de l'état du projet a été notifié par mail aux utilisateurs");
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('admin');

        $project->delete();
        return redirect(route('admin.projects.index'));
    }

    /**
     * Associate the negotiator to the project
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function associateUSer(Request $request, Project $project)
    {
        $this->authorize('admin');

        $negotiatorId = request('negotiator');

        $project->negotiator_id = $negotiatorId;
        $project->save();

        /*** Notifications ***/
        Notification::send([$project->client, $project->negotiator], new AssociationAdded($project));


        return redirect(route('admin.projects.index'));
    }
}
