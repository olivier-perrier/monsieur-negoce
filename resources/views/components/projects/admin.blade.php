@can('admin')
<section class="mt-3">

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
                            <option value="{{ $state->id}}" {{ $state->id === $project->state_id ? 'selected' : '' }}>
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
</section>
@endcan