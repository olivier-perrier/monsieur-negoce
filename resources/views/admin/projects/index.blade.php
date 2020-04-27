@component('layouts.exmachina')

<div class="container">

    <h3 class="title">Projets</h3>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"></th> <!-- Identifiant -->
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Négociateur associé</th> <!-- Associer négociateur -->
                    <th scope="col"></th> <!-- Voir -->
                    <th scope="col"></th> <!-- Supprimer -->
                </tr>
            </thead>

            <tbody>

                @foreach($projects as $project)

                <tr>
                    <th scope="row">N°{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->category->title }}</td>

                    <!-- Négociateur associé -->
                    <td>
                        <form method="POST" action="/admin/projects/{{ $project->id }}/associate" class="form-inline">
                            @csrf
                            @method('PUT')
                            <select class="custom-select" name="negotiator">
                                <option value="">Aucun</option>
                                @foreach($negotiators as $negotiator)
                                <option @if ($project->negotiator)
                                    {{ $project->negotiator->id ===  $negotiator->id ? 'selected' : '' }}
                                    @endif
                                    value="{{ $negotiator->id }}">
                                    N°{{ $negotiator->id }} - {{ $negotiator->firstname }}
                                    {{ $negotiator->lastname }}
                                </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-link">Associer</button>
                        </form>
                    </td>
                    <!-- Suppression -->
                    <td>
                        <form method="POST" action="/admin/projects/{{ $project->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link">Supprimer</button>
                        </form>
                    </td>
                    <td><a href="/projects/{{ $project->id }}" class="btn btn-link">></a></td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endcomponent