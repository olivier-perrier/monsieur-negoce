<?php

namespace App\Mail\Client;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoteAdded extends Mailable
{
    use Queueable, SerializesModels;


    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('emails.clients.note-added')
        ->subject("Monsieur Négoce - Des nouvelles de votre projet");
    }
}
