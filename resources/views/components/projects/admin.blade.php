@can('admin')

<section class="mt-3">

    <div class="row">

        <div class="col-md-6">

            <div class="box">
                <h3 class="text-danger ">Administration</h3>

                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="field">
                        <label class="label mr-1 ">Etapes d'avancement</label>
                        <div class="control">
                            <div class="select">
                                <select name="state">
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id}}"
                                        {{ $state->id === $project->state_id ? 'selected' : '' }}>
                                        {{ $state->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Montant négocié</label>
                        <div class="control">
                            <input class="input" type="number" name="amount_negotiated"
                                value="{{ $project->amount_negotiated }}" placeholder="0">
                        </div>
                        <p class="help">Montant négocié une fois le devis du négociateur déposé. Ce montant servira à la
                            facturation du négociateur par le client.</p>
                        <p class="help">Montant à exprimer euros</p>
                    </div>

                    <div class="field">
                        <label class="label">Taxe pour le négociateur (%)</label>
                        <div class="control">
                            <input class="input" type="number" step="0.01" min="0" max="100" placeholder="0"
                                name="fee_negotiator_pourcent" value="{{ $project->fee_negotiator_pourcent }}">
                        </div>
                        <p class="help">Taxe appliquée au montant négocié qui sera bénéficiée par le négociateur.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Sauvegarder</button>

                    @if(session('notification_state'))
                    <p class="help is-success">{{ session('notification_state') }}</p>
                    @endif

                </form>

            </div>
        </div>

        <div class="col-md-6">
            <div class="box">
                <h3 class="text-danger ">Encaissement négociateur</h3>

                <form method="POST" action="{{ route('admin.cashings.update', $cashing->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="field">
                        <label class="label mr-1 ">Etat de l'encaissement</label>
                        <div class="control">
                            <div class="select">
                                <select name="state">
                                    @foreach ($cashing->allStates() as $state)
                                    <option value="{{ $state->id}}"
                                        {{ $state->id === $cashing->state_id ? 'selected' : '' }}>
                                        {{ $state->value }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <x-fields.input name="amount" :value="$cashing->amount" type="number"
                        label="Montant brut (€)" help="Montant brut de la négociation" />

                    <x-fields.input name="taxe" :value="$cashing->taxe" type="number"
                        label="Taxe (%)" help="Taxe qui sera reversé au négotiateur" />

                    <x-fields.input name="net_amount" :value="$cashing->net_amount" type="number"
                        label="Montant net (€)" atts="disabled"
                        help="Montant calculé automatiquement lors de la sauvegarde" />

                    <button type="submit" class="btn btn-primary">Sauvegarder</button>

            </div>
        </div>
    </div>

</section>
@endcan