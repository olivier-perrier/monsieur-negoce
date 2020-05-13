@component('layouts.site')


<div class="my-5">

    <div style="text-align:right;">
        <a class="btn btn-danger" href="{{ route('projects.create') }}" role="button">Nouveau projet</a>
    </div>

    <h3 class="">Mes projets</h3>

    <div class="box">
        <div class="table-responsive">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col">N° de dossier</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Projet</th>
                        <th scope="col">Négociateur</th>
                        <th scope="col">Etat</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($projects as $project)
                    <tr>
                        <th scope="row">N° {{ $project->created_at->format('dmY') . '-' . $project->id }}</th>
                        <td>{{$project->created_at}}</td>
                        <td><a href="{{ route('projects.show', $project->id) }}"
                                class="btn btn-link text-left">{{$project->name}}</a></td>
                        <td>
                            @if($project->negotiator)
                            {{$project->negotiator->firstname . ' ' . $project->negotiator->lastname}}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            <x-projects.badge-state :state="$project->state" />
                        </td>
                        <td><a href="{{ route('projects.show', $project->id) }}" class="btn btn-link"><i
                                    class="fas fa-chevron-right"></i></a></td>
                    </tr>
                    @endforeach

            </table>

        </div>
    </div>

    <!-- Legende -->
    <div class="mt-5">
        <table class="table table-sm table-borderless">
            <tbody>
                @foreach($states as $state)
                <tr>
                    <th>
                        <x-projects.badge-state :state="$state" />
                    </th>
                    <td>{{ $state->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endcomponent