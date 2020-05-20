@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Vous venez d'effectuer une demande de reversement depuis votre compte Monsieur Négoce. Afin que nous puissions la traiter dans les meilleurs délais, vous devez nous faire parvenir une facture.  
  
Si vous devez nous faire parvenir manuellement une facture pour cette demande, merci de nous l’adresser avec les éléments suivants :  
  
- le numéro de transaction : 20110523550013  
- le montant TTC de vos reversements : XXXX euros  
- le taux de TVA appliqué : 20.00 %   
- les informations légales (N° de TVA compris) ainsi que l’entête de votre société (en tant qu’Emetteur de la facture)  
- les informations concernant Monsieur Négoce (en tant que Destinataire de la facture) :  
  
Monsieur Negoce  
38, rue François Chénieux  
87000 Limoges - France  
N° TVA FR 87 810 968 040  
N° SIRET 810 968 040 00016  
  
Rappel du montant TOTAL de votre facture : {{ $user->amount_total_due() }} €  
  
Cette facture doit être adressée par mail à : facture@monsieur-negoce.com ou par courrier à :  
SAS MYNS Developpement  
Monsieur Negoce  
38, rue François Chénieux  
87000 Limoges  
  
Pour toute information complémentaire, n’hésitez-pas à nous contacter.   
  
  
@component('emails.address')
@endcomponent

@endcomponent