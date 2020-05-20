@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Nous tenons à vous informer que le traitement de votre projet étant effectué, votre projet vient d’être attribué à un négociateur.  
Ce négociateur va maintenant prendre en charge la négociation de votre projet.  
Vous serez informé tout au long du processus de négociation.  
  
Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.  
Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.  
  
@component('emails.address')
@endcomponent

@endcomponent