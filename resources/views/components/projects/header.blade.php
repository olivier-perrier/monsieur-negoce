<div class="columns">
    <div class="column">
        @if ($project->client)
        <div class="alert alert-success" role="alert">
            <p>{{ $project->client->fullname() }} n°suivi {{ $project->id }} - {{ $project->category->value }}
            </p>
        </div>
        @else
        <div class="alert alert-warning" role="alert">
            <p>Attention ce projet n'appartient à aucun client</p>
        </div>
        @endif
    </div>

    <div class="column">
        @if ($project->negotiator)
        <div class="alert alert-primary" role="alert">
            <p>Négotiateur associé {{ $project->negotiator->fullname() }}</p>
        </div>
        @else
        <div class="alert alert-primary" role="alert">
            <p>En attente de négotiateur</p>
        </div>
        @endif
    </div>
</div>


@if($project->state->step === 3 & $project->amount_negotiated !== null)
<div class="alert alert-info" role="alert">
    <p>Félicitation la négociation a réussi - Montant négocié {{ $project->amount_negotiated }}€</p>
</div>
@endif