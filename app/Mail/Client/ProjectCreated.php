<?php

namespace App\Mail\Client;

use App\Project;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Project $project)
    {
        $this->user = $user;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.clients.project-created')
            ->subject('Monsieur Négoce - Confirmation création d’un projet');
    }
}
