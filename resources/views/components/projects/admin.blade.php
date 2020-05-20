@can('admin')

<section class="mt-3">

    <div class="row">

        <div class="col-md-6">

            <div class="card card-body">
                <h3 class="text-danger ">Administration projet</h3>

                <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="field">
                        <label class="label mr-1 ">Etapes d'avancement</label>
                        <div class="control">
                            <div class="select">
                                <select name="state">
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id}}" {{ $state->id === $project->state_id ? 'selected' : '' }}>
                                        {{ $state->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Montant négocié (€)</label>
                        <div class="control">
                            <input class="input" type="number" name="amount_negotiated" value="{{ $project->amount_negotiated }}" placeholder="0">
                        </div>
                        <p class="help">Montant négocié sur le projet. Ce montant est à titre indicatif uniquement visible sur le projet.</p>
                    </div>

                    <button type="submit" class="btn btn-primary">Sauvegarder</button>

                </form>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-body">
                <h3 class="text-danger ">Encaissement négociateur</h3>

                @if ($cashing)

                <form method="POST" action="{{ route('admin.cashings.update', $cashing->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="field">
                        <label class="label mr-1 ">Etat de l'encaissement</label>
                        <div class="control">
                            <div class="select">
                                <select name="state">
                                    @foreach ($cashing->allStates() as $state)
                                    <option value="{{ $state->id}}" {{ $state->id === $cashing->state_id ? 'selected' : '' }}>
                                        {{ $state->value }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <x-fields.input name="amount" :value="$cashing->amount" type="number" label="Montant brut (€)" help="Montant brut de la négociation" />

                    <x-fields.input name="taxe" :value="$cashing->taxe" type="number" label="Taxe (%)" help="Taxe qui sera reversé au négotiateur" />

                    <x-fields.input name="net_amount" :value="$cashing->net_amount()" type="number" label="Montant net (€)" atts="disabled" help="Montant calculé automatiquement lors de la sauvegarde" />

                    <button type="submit" class="btn btn-primary">Sauvegarder</button> <br>


                </form>

                <form action="{{ route('admin.projects.cashings.alert-nego', $project->id) }}" method="post">
                    @csrf
                    <button type="submit" class="button is-primary my-2">Informer le négociateur</button>
                    <small class="form-text text-muted">Envoyer un mail au négociateur pour l'informer que la négociation est réussie ainsi que la somme qu'il percevra.</small>
                    <small class="form-text text-muted">Les informations d'encaissement doivent être remplis !</small>
                    @if(session('mail_sent'))
                    <p class="help is-info">{{ session('mail_sent') }}</p>
                    @endif
                </form>

                @else

                @if($project->negotiator)
                <form method="POST" action="{{ route('admin.projects.cashings.store', $project->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Ajouter un encaissement</button>
                </form>
                @else
                <span>Attention un projet doit être associé à un négociateur pour pouvoir lui ajouter un
                    encaissement.</span>
                @endif

                @endif



            </div>
        </div>
    </div>

</section>
@endcan