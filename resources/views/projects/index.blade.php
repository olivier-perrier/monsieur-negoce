@component('layouts.exmachina')


<div class="container mt-5">

    <div style="text-align:right;">
        <a class="btn btn-danger" href="/projects/create" role="button">Nouveau projet</a>
    </div>

    <h3 class="title">Mes projets</h3>

    <div class="box">
        <div class="table-responsive">
            <table class="table table-hover">
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
                        <th scope="row">N° {{$project->id}}</th>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->negotiator->firstname}} {{$project->negotiator->lastname}}</td>
                        <!-- TODO avec uen clé étrangere -->
                        <td>{{$project->state}} <span class="tag {{ $project['attributes'] }} is-rounded">{{ $project['title'] }}</span></td>
                        <td><a href="/projects/{{$project->id}}" class="btn btn-link">></a></td>
                    </tr>
                    @endforeach

            </table>

        </div>
    </div>

    <!-- Legende -->
    <div class="mt-5">
        <table class="table table-sm table-borderless">
            <tbody>
                @foreach($project->STATES as $state)
                <tr>
                    <th><span class="tag {{ $state['attributes'] }} is-rounded">{{ $state['title'] }}</span></th>
                    <td>{{ $state['description'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endcomponent