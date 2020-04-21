@component('layouts.exmachina')


<div class="container mt-5">

    <div style="text-align:right;">
        <a class="btn btn-danger" href="/projects/create" role="button">Nouveau projet</a>
    </div>

    <h1>Mes projets</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Numéro de dossier</th>
                <th scope="col">Date de création</th>
                <th scope="col">Nom du projet</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->created_at}}</td>
                <td>{{$project->name}}</td>
                <td><a href="/projects/{{$project->id}}" class="button">Voir</a></td>
            </tr>
            @endforeach

    </table>

</div>


@endcomponent