@component('layouts.site')

<div>

    <h3 class="">Projets</h3>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"></th> <!-- Supprimer -->
                    <th scope="col"></th> <!-- Identifiant -->
                    <th scope="col">Saisie</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                    <th scope="col">Client</th>
                    <th scope="col">Négociateur associé</th> <!-- Associer négociateur -->
                    <th scope="col"></th> <!-- Voir -->
                </tr>
            </thead>

            <tbody>

                @foreach($projects as $project)

                <tr>
                    <!-- Suppression -->
                    <td>
                        <form method="POST" action="{{ route('admin.projects.delete', $project->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link"><i
                                    class="far fa-trash-alt text-danger"></i></button>
                        </form>
                    </td>
                   
                    <th scope="row">N° {{ $project->created_at->format('dmY') . '-' . $project->id }}</th>
                    <td>{{ $project->created_at->todatestring() }}</td>
                    <td><a href="{{ route('projects.show', $project->id) }}" class="">{{ $project->name }}</a></td>
                    <td>{{ $project->category->value | replace:" - " }}</td>
                    {{-- Client --}}
                    <td>
                        @if($project->client)
                        <a href="{{ route('users.show', $project->client->id) }}">
                            {{ $project->client->fullname() }}
                        </a>
                        @endif
                    </td>

                    <!-- Négociateur associé -->
                    <td>
                        <form method="POST" action=" {{ route('admin.projects.associate', $project->id) }}"
                            class="form-inline">
                            @csrf
                            @method('PUT')
                            <select class="custom-select" name="negotiator" onChange="this.parentNode.submit()">
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
                            {{-- <button type="submit" class="btn btn-link">Associer</button> --}}
                        </form>
                    </td>
                    <td><a href="{{ route('projects.show', $project->id) }}" class="btn btn-link"><i
                                class="fas fa-chevron-right"></i></a></td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endcomponent