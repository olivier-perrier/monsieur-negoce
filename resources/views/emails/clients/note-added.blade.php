@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }}

Vous avez reçu une information de la part de votre négociateur.  
Connectez-vous pour en prendre connaissance dès à présent   
  
Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.  
 
@component('emails.address')
@endcomponent

@endcomponent