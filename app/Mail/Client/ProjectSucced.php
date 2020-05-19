<?php

namespace App\Mail\Client;

use App\Project;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectSucced extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $project;

    public function __construct(User $user, Project $project)
    {
        $this->user = $user;
        $this->project = $project;
    }

    public function build()
    {
        return $this->markdown('emails.clients.project-succed')
        ->subject("Monsieur Négoce - La négociation a réussi");
    }
}
