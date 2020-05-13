<?php

namespace App\Http\Controllers\Admin;

use App\Cashing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, Cashing $cashing)
    {
        $this->authorize('admin');

        // dd($request->all());

        $cashing->update([
            'state_id' => request('state'),
            'amount' => request('amount'),
            'taxe' => request('taxe'),
        ]);

        // Calcul le montant net grâce à la taxe
        $net_amount = request('amount') *  request('taxe') / 100;
        $cashing->net_amount = $net_amount;

        // 'net_amount' => request('cashing_net_amount')

        $cashing->save();

        return back();

    }
}
