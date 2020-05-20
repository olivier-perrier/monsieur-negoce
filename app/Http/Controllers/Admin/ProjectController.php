<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Client\NegoAssociated;
use App\Mail\Client\ProjectSucced;
use App\Mail\Nego\ProjectAssociated;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        $this->authorize('admin');

        $project->update([
            'state_id' => request('state'),
            'amount_negotiated' => request('amount_negotiated'),
        ]);

        $project->save();

        /*** Notifications ***/

        //Negociation réussie
        if ($project->state->isSucced()) {
            if ($project->client)
                Mail::to($project->client)->send(new ProjectSucced($project->client, $project));
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

        dd($project);
        $project->delete();

        return back();
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


        /*** Mails ****/

        if ($project->client) {
            Mail::to($project->client)->send(new NegoAssociated($project->client));
        }

        if ($project->negotiator) {
            Mail::to($project->negotiator)->send(new ProjectAssociated($project->negotiator));
        }


        return redirect(route('admin.projects.index'));
    }
}
