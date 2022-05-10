@component('mail::message')

# Vous avez reçu un message

Le négociateur de votre projet vous a laissé un message.

Message :

{{ $note->content }}

@component('mail::button', ['url' => config('app.url') . '/projects/' . $project_id])
Voir le message
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
