<?php

namespace App\Notifications;

use App\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NoteAdded extends Notification
{
    use Queueable;

    public $project_id;
    public $note;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Note $note, $project_id)
    {
        $this->note = $note;
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
        $noteContent = $this->note ? $this->note->content : "Vide";

        return (new MailMessage)
            ->subject('Monsieur Négoce - vous avez un nouveau message')
            ->greeting('Bonjour')
            ->line('Vous avez un nouveau message sur votre projet')
            ->line('Message :"' . $noteContent . '"')
            ->action('Voir le projet', config('app.url') . '/projects/' . $this->project_id)
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
