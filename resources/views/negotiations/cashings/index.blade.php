@component('layouts.exmachina')

<div class="container">

    <h3>Mes encaissements</h3>

    <div class="card">
        <div class="card-body">
            <h5>Mon solde total :</h5>
            <p>Le solde total correspond à la somme des encaissements des négociations terminées.
            Appuyez sur demander un versement pour nous envoyer un mail afin qu'un versement vous soit effetué.</p>
            <p>Veillez à ce que vos informations bancaires soient bien rensignés</p>
            <button>Demander un versement</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">


            Projets pour lesquels vous avez droit à un versement

            <table class="table table-sm table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col">Identifiant</th>
                        <th scope="col">Montant négocié</th>
                        <th scope="col">Pourcentage</th>
                        <th scope="col">Montant dû</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($projects as $project)
                    <tr>
                        <td>N°{{ $project->id }}</td>
                        <td>{{ $project->amount_negotiated ? $project->amount_negotiated . '€' : '-' }}</td>
                        <td>{{ $project->fee_negotiator_pourcent ? $project->fee_negotiator_pourcent . '%' : '-'}}</td>
                        <td>{{ $project->amount_negotiated * $project->fee_negotiator_pourcent / 100 ? $project->amount_negotiated * $project->fee_negotiator_pourcent / 100 . '€' : '-'}}
                        </td>
                        <td><a href="{{ route('negotiations.show', $project->id) }}">></a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>

</div>

@endcomponent