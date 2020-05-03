<?php

namespace App\Mail;

use App\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public Note $note;
    public String $project_id;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Note $note, String $project_id)
    {
        $this->note = $note;
        $this->project_id = $project_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')
        ->subject('Monsieur Négoce - Vous avez un nouveau message');
    }
}
