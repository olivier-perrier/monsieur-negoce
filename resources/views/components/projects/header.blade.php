<div class="alert alert-success" role="alert">
    <p>{{ $project->client->firstname }} {{ $project->client->lastname }} n°suivi {{ $project->id }} -
        {{ $project->category->value }}
    </p>
</div>

@if($project->state->step === 3 & $project->amount_negotiated !== null)
<div class="alert alert-info" role="alert">
    <p>Félicitation la négociation a réussi - Montant négocié {{ $project->amount_negotiated }}€</p>
</div>
@endif