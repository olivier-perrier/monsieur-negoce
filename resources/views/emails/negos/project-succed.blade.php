@component('emails.logo')
@endcomponent

@component('mail::message')

# Bonjour {{ $user->fullname() }},  

Félicitations, vous avez réussi à négocier le projet.  
Une fois le règlement effectué par le client, vous serez crédité d’un montant de : {{ $project->cashing->net_amount() }} euros  
  
Ce montant sera disponible dans votre interface négociateur, rubrique encaissements.    
  
@component('emails.address')
@endcomponent

@endcomponent