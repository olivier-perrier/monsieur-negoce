<?php

namespace App\Http\Controllers;

use App\Mail\Client\NoteAdded;
use App\Mail\Contact;
use App\Mail\ContactMe;
use App\Meta;
use App\Note;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NoteController extends Controller
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
    public function store(Request $request)
    {
        $this->authorize('negotiator');

        $project_id = $request->query('negotiation');

        $noteAtt = request()->validate([
            'type_id' => 'required',
            'content' => 'required',
        ]);

        $note = new Note($noteAtt);
        $note->project_id = $project_id;
        $note->save();


        /*** Mails ****/

        $client = $note->project->client;
        if ($client) {
            Mail::to($note->project->client)->send(new NoteAdded($client));
        }

        // Administrateur
        Mail::to(User::get_administrators())->send(new NoteAdded($client));

        return back()
            ->with('notification_note', 'Un mail a été envoyé pour informer le client de votre commentaire.');
    }
}
