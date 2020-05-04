<div class="card mb-3">
    <div class="card-body">
        <h5 class="text-center">Suivi de la négociation</h5>

        @if($project->notes->count())
        <table class="table table-sm table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Type d'information</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>

                @foreach($project->notes as $note)
                <tr>
                    <td>{{ $note->created_at }}</td>
                    <td>{{ $note->type->value }}</td>
                    <td>{{ $note->content }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @else
        <small class="form-text text-muted m-5">Ajoutez une note de l'avancement de la négociation du
            client.</small>
        @endif

        <!-- Ajoute d'une note pour les négociateurs -->
        @can('negotiator')

        <form method="POST" action="{{ route('notes.store', ['negotiation' => $project->id ]) }}" class="form-inline">
            @csrf

            <div class="field is-grouped">

                <p class="control">
                    <button type="submit" class="button btn-info mb-2">Ajouter une note</button>
                </p>

                <div class="control">
                    <div class="select ">
                        <select name="type_id">
                            @foreach ($noteTypes as $type)
                            <option value="{{$type->id}}">{{ $type->value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <p class="control">
                    <input type="text" class="input" name="content" placeholder="Commentaire">
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </p>

            </div>

        </form>

        @endcan
        @error('content')
        <p class="help is-danger">{{ $message }}</p>
        @enderror
        @if(session('notification_note'))
        <p class="help is-success">{{ session('notification_note') }}</p>
        @endif
        <!-- FIN AJOUT NOTE -->
    </div>
</div>