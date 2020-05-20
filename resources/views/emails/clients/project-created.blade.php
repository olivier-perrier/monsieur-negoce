@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Votre demande de projet a bien été reçue, elle actuellement en cours de traitement. <br>
Une fois le traitement effectué, votre projet sera attribué à un négociateur qui reviendra vers vous. <br>

Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations. <br>

@component('emails.address')
@endcomponent

@endcomponent