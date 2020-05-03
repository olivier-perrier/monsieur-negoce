<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMe;
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

        // dd($request->query('project'));

        $validatedAttributes = request()->validate([
            // 'type' => '',
            'content' => ['required'],
        ]);

        $notification = new Note(request(['type', 'content']));
        $notification->type = "Contact entreprise";
        $notification->project_id = $project_id;
        $notification->save();

        $client_email = $notification->project->client->email;  // TODO véfification des objets existant
        $client = $notification->project->client;  // TODO véfification des objets existant

        /***  Send notifications ***/
        // Client
        Notification::send($client, new NoteAdded($notification, $project_id));
        // Administrateur
        Notification::send(User::where('role', 'administrator')->get(), new NoteAdded($notification, $project_id));

        // Send mails
        // dd($client_email);
        // Mail::to($client_email)
        //     ->send(new Contact($notification, $project_id));

        // Mail::raw('It works', function ($message) {
        //     $message->to('olivier.perrier.j@gmail.com')
        //         ->subject('Hello there');
        // });

        // $request->session()->flash('notification.note', 'salut');

        // dd($request->session()->get('notification.note'));

        return redirect(route('negotiations.show', $project_id))
            ->with('notification_note', 'Un mail a été envoyé avec succés pour signaler le commentaire.');
    }
}
