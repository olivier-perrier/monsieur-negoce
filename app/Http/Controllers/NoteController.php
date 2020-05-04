<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMe;
use App\Meta;
use App\Note;
use App\Notifications\NoteAdded;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        // TODO add security
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

        /***  Notifications ***/

        if ($note->project->client) {
            $client = $note->project->client;
            Notification::send($client, new NoteAdded($note, $project_id));
        }
        // Administrateur
        Notification::send(User::get_administrators(), new NoteAdded($note, $project_id));

        // redirect(route('projects.show', $project_id))
        return back()
            ->with('notification_note', 'Un mail a été envoyé pour informer le lcient de votre commentaire.');
    }
}
