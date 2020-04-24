<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $project_id = $request->query('negotiation');

        // dd($request->query('project'));

        $validatedAttributes = request()->validate([
            // 'type' => '',
            'content' => ['required'],
        ]);

        // dd($validatedAttributes);
        $notification = new Notification(request(['type', 'content']));
        $notification->type = "Contact entreprise";
        $notification->project_id = $project_id;
        $notification->save();

        // dd($notification);
        // return "salut";

        return redirect(route('negotiations.show', $project_id));
    }
}
