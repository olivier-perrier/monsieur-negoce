<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CashingAsked extends Notification
{
    use Queueable;

    public $user;
    public $cashingAmount;
    public $cashingDate;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $cashingAmount, $cashingDate)
    {
        $this->user = $user;
        $this->cashingAmount = $cashingAmount;
        $this->cashingDate = $cashingDate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Monsieur Négoce - demande d\'encaissement')
        ->greeting('Bonjour')
        ->line('Votre demande d\'encaissement a bien été reçu. Nous allons prendre contact avec vous dans les plus brefs délais.')
        ->line('Date de la demande : ' . $this->cashingDate)
        ->line('Montant de l\'encaissement : ' . $this->cashingAmount . '€')
        ->action('Voir mes encaissements', config('app.url') . '/users/' . $this->user->id .'/cashings')
        ->salutation('Merci de votre confiance.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
