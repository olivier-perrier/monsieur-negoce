<?php

namespace App\Mail\Nego;

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
        return $this->markdown('emails.negos.cashing-asked')
        ->subject("Monsieur Négoce - Vous avez reçu un règlement");
    }
}
