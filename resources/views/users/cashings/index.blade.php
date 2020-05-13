@component('layouts.site')

<style>
    .card {
        box-shadow: 0px 0px lightgrey;
    }

    .card:hover {
        box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, .1), 0 0 0 1px rgba(10, 10, 10, .02);
    }
</style>

<div class="container my-3">

    <h3>Mes encaissements</h3>

    <div class="card  mb-3">
        <div class="card-body">
            <h5>Mon solde total : {{ $user->amount_total_due() }}€ </h5>
            <p class="text-muted">Le solde total correspond à la somme des encaissements des négociations sur lesquelles
                vous travaillez.
                Appuyez sur demander un versement pour nous envoyer un mail afin qu'un versement vous soit effectué.</p>
            <p class="text-muted">Veillez à ce que vos informations bancaires soient bien renseignées</p>
            <p class="text-muted">Montant déjà reversé {{ $user->amount_total_reversed() }}€ </p>
            <form action="{{ route('users.cashings.payment', $user) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">Demander un versement</button>
            </form>
            @if(session('notification_cashing'))
            <p class="help is-success">{{ session('notification_cashing') }}</p>
            @endif

        </div>
    </div>

    {{-- Nouveau encaissements --}}
    <div class="card mb-3">
        <div class="card-body">


            <strong>Vos encaissements</strong>

            @if($cashings->count())
            <table class="table table-sm table-borderless table-hover">
                <thead>
                    <tr>
                        <th scope="col">Identifiant</th>
                        <th scope="col">Montant négocié</th>
                        <th scope="col">Pourcentage</th>
                        <th scope="col">Montant du</th>
                        <th scope="col">Etat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($cashings as $cashing)
                    <tr>
                        <td>N°{{ $cashing->id }}</td>
                        <td>{{ $cashing->amount ? $cashing->amount . '€' : '-' }}</td>
                        <td>{{ $cashing->taxe ? $cashing->taxe . '%' : '-'}}</td>
                        <td>{{ $cashing->net_amount ? $cashing->net_amount . '€' : '-'}}
                        </td>
                        <td>
                            <span
                                class="badge badge-pill badge-primary p-2 d-flex justify-content-center">{{ $cashing->state->value }}</span>
                        </td>
                        <td>
                            <a href="{{ route('projects.show', $cashing->project->id) }}"><i
                                    class="fas fa-chevron-right"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <p>Aucun encaissements pour l'instant</p>
            @endif

        </div>

    </div>

    <!-- Informations bancaires -->
    <div class="card  mb-3">
        <div class="card-body">

            <div class="row">

                <div class="col-md-5">
                    <h5>Coordonnées postales pour les chèques</h5>
                    <p>{{ $user->firstname . ' ' . $user->lastname }}</p>
                    @if($user->address)
                    <p>{{ $user->address->street }}</p>
                    <p>{{ $user->address->postcode . ' ' . $user->address->city }}</p>
                    @endif
                </div>

                <div class="col-md-7">
                    <h5>Corrdonnées bancaire pour virement</h5>
                    @if($user->bank)
                    <p>IBAN {{ $user->bank->iban }}</p>
                    <p>Code swift {{ $user->bank->swift }}</p>
                    <p>Nom de la banque {{ $user->bank->name }}</p>
                    <p>Adresse {{ $user->bank->address }}</p>
                    @endif
                </div>
            </div>

            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Modifier mon profil</a>

        </div>
    </div>

</div>

@endcomponent