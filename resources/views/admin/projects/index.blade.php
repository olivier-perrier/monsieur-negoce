@component('layouts.exmachina')

<div class="container">

    <h3 class="title">Projets</h3>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>   <!-- Voir -->
                    <th scope="col"></th>   <!-- Supprimer -->
                </tr>
            </thead>

            <tbody>

                @foreach($projects as $project)

                <tr>
                    <th scope="row">N° {{$project->id}}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->category->title }}</td>
                    <td><a href="/projects/{{ $project->id }}" class="btn btn-link p-0">Voir</a></td>
                    <!-- Suppression -->
                    <td>
                        <form method="POST" action="/admin/projects/{{ $project->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endcomponent