<div class="card">
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
                    <td>{{ $note->type }}</td>
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

            <div class="form-group mx-2 mb-2">
                <input type="text" class="form-control" name="content">
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-info mb-2">Ajouter une note</button>
        </form>
        @endcan
        <!-- FIN AJOUT NOTE -->
    </div>
</div>