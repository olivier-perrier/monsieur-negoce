@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Nous avons bien reçu votre demande de réinitialisation de mot de passe.  
  
Nous vous invitons à cliquer sur le lien suivant pour changer votre mot de passe :  
  
@component('mail::button', ['url' => url('password/reset', $token, $user)])
Réinitialiser le mot de passe
@endcomponent
  
Si vous n’êtes pas à l’origine de cette demande, vous pouvez ignorer cet email et votre mot de passe restera inchangé.  
  
Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.  
  
  
@component('emails.address')
@endcomponent

@endcomponent