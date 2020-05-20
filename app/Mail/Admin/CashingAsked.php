<?php

namespace App\Mail\Admin;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CashingAsked extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('emails.admins.cashing-asked')
        ->subject("Monsieur Négoce - Nouvelle demande de reversement de " . $this->user->fullname());
    }
}
