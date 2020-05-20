@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Votre négociateur est parvenu à négocier votre prestation.  
Connectez-vous pour en prendre connaissance dès à présent.  
Vous devez dès aujourd’hui vous acquitter d’un montant de : {{ $project->amount_negotiated }} euros  
  
Vous pouvez régler ce montant par chèque bancaire à l’ordre de :  
- SAS MYNS Developpement
- Monsieur Négoce
- 38, rue François Chénieux
- 87000 Limoges
  
Ou par virement bancaire aux coordonnées bancaires suivantes :
- IBAN : FR76 3000 3011 2000 0270 3490 325 BIC
- Adresse SWIFT : SOGEFRPP
- Référence :  {{ $project->id }}  
  
Nous restons à votre entière disposition, n'hésitez pas à nous contacter, par courriel ou par téléphone, pour de plus amples informations.  
   
  
@component('emails.address')
@endcomponent

@endcomponent