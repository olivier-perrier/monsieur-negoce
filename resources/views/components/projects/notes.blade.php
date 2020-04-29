<div>
    <h5 class="title is-5 text-center">Suivi de la négociation</h5>

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
    <span class="m-1">Suivez ici les commentaires ajouté par le négociateur</span>
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
        <small class="form-text text-muted ml-1">Ajoutez une note de l'avancement de la négociation
            du client.</small>
    </form>
    @endcan
    <!-- FIN AJOUT NOTE -->
</div>