<?php

namespace App\Notifications;

use App\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FileUploaded extends Notification
{
    use Queueable;

    public $project_id;
    public $filename;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(String $filename, $project_id)
    {
        $this->filename = $filename;
        $this->project_id = $project_id;
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
            ->subject('Monsieur Négoce - un devis a été ajouté')
            ->greeting('Bonjour')
            ->line('Un devis a été ajouté sur votre projet (' . $this->filename . ')')
            ->action('Voir le projet', config('app.url') . '/projects/' . $this->project_id)
            ->salutation('Merci d\'utiliser notre application');
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
