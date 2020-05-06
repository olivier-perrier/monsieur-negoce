<?php

namespace App\Notifications;

use App\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssociationAdded extends Notification
{
    use Queueable;

    public $project;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
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
        $clientName = $this->project->client ? $this->project->client->fullname() : "Aucun client";
        $negoName = $this->project->negotiator ? $this->project->negotiator->fullname() : "Aucun négociateur";
        
        return (new MailMessage)
            ->subject('Monsieur Négoce - avancement du projet')
            ->greeting('Bonjour')
            ->line('Le projet "' . $this->project->name . '" est maintenant associé à un négociateur.')
            ->line('Client ' . $clientName
                . ' - Négociateur ' . $negoName . '.')
            ->action('Voir le projet', config('app.url') . '/projects/' . $this->project->id)
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
