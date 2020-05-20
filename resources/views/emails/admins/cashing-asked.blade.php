@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour,

Une nouvelle demande de reversement de {{ $user->fullname() }}

@component('mail::button', ['url' => route('users.show', $user->id) ])
Voir le profil
@endcomponent

@component('mail::button', ['url' => route('users.cashings.index', $user->id) ])
Voir les encaissements
@endcomponent


@component('emails.address')
@endcomponent

@endcomponent