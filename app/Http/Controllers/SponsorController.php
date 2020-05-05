<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SponsorInvitation;
use App\Sponsor;

class SponsorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $this->authorize('ownerOrAdmin', $user->id);

        $sponsors = User::where('sponsor', $user->email)->get();
        $sponsor_link = route('register', ['sponsor' => $user->email]);
        return view('sponsors.index', [
            'sponsors' => $sponsors,
            'sponsor_link' => $sponsor_link,
        ]);
    }

    public function show(User $user)
    {
    }

    public function invite(Request $request)
    {

        request()->validate(['sponsor_mail' => 'required|email']);

        Notification::route('mail', request('sponsor_mail'))
            ->notify(new SponsorInvitation(Auth::user()));

        $request->session()->flash('notification_mail', "Mail envoyé avec succés.");

        return back();
    }
}
