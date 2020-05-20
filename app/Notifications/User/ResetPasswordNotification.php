<?php

namespace App\Notifications\User;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $user;
    public $token;

    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
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
            ->subject('Monsieur Négoce - Retrouver son mot de passe')
            ->greeting('Bonjour ' . $this->user->fullname() . ',')
            ->line('Nous avons bien reçu votre demande de réinitialisation de mot de passe.')
            ->line('Nous vous invitons à cliquer sur le lien suivant pour changer votre mot de passe :')
            ->action('Redéfinir le mot de passe', url('password/reset', $this->token))
            ->line('Si vous n’êtes pas à l’origine de cette demande, vous pouvez ignorer cet email et votre mot de passe restera inchangé.')
            ->line("Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.");
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
