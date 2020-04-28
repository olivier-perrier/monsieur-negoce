<?php

namespace App\Http\Controllers;

use App\Note;
use App\Notification;
use Illuminate\Http\Request;

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

        // dd($validatedAttributes);
        $notification = new Note(request(['type', 'content']));
        $notification->type = "Contact entreprise";
        $notification->project_id = $project_id;
        $notification->save();

        // dd($notification);
        // return "salut";

        return redirect(route('negotiations.show', $project_id));
    }
}
