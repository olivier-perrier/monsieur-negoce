@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Un nouveau projet à négocier vient de vous être attribué.  
Nous comptons sur vous pour mener à bien cette négociation et nous vous invitons à vous connecter pour en prendre connaissance.  
Pensez à tenir informé votre client durant l’ensemble des étapes par le biais des notes sur l’interface.  
Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.  
 
@component('emails.address')
@endcomponent

@endcomponent