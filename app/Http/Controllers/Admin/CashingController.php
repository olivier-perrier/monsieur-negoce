<?php

namespace App\Http\Controllers\Admin;

use App\Cashing;
use App\Http\Controllers\Controller;
use App\Mail\Nego\ProjectSucced;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CashingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {

        $this->authorize('admin');

        if ($project->negotiator) {
            $cashing = new Cashing();
            $cashing->project_id = $project->id;
            $cashing->state_id = Cashing::state_id(Cashing::$STATE_EN_COURS);

            $cashing->user_id = $project->negotiator->id;

            $cashing->save();
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\User  $user
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cashing $cashing)
    {
        $this->authorize('admin');

        $cashing->update([
            'state_id' => request('state'),
            'amount' => request('amount'),
            'taxe' => request('taxe'),
        ]);

        $cashing->save();

        return back();
    }

    /**
     * Signal au négoiateur que la négociation est un succès et lui envoie un mail
     */
    public function alertNego(Request $request, Project $project)
    {

        if ($project->negotiator) {
            if ($project->state->isSucced()) {
                Mail::to($project->client)->send(new ProjectSucced($project->client, $project));
                $request->session()->flash('mail_sent', "Un mail a été envoyé au négociateur.");
            } else {
                $request->session()->flash('mail_sent', "La négociation doit être réussie pour envoyer un mail au négociteur.");
            }
        } else {
            $request->session()->flash('mail_sent', "Impossible d'envoyer un mail au négociateur.");
        }

        return back();
    }
}
