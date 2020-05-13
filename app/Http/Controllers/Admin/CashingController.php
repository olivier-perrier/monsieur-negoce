<?php

namespace App\Http\Controllers\Admin;

use App\Cashing;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class CashingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function update(Request $request, Cashing $cashing)
    {
        $this->authorize('admin');

        $cashing->update([
            'state_id' => request('state'),
            'amount' => request('amount'),
            'taxe' => request('taxe'),
        ]);

        // Calcul le montant net grâce à la taxe
        $net_amount = request('amount') *  request('taxe') / 100;
        $cashing->net_amount = $net_amount;
        $cashing->save();

        return back();
    }
}
