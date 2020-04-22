@component('layouts.exmachina')


<div class="container mt-5">

    <div style="text-align:right;">
        <a class="btn btn-danger" href="/projects/create" role="button">Nouveau projet</a>
    </div>

    <h1>Mes négociations</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Date de création</th>
                <th scope="col">Client</th>
                <th scope="col">Type de négociation</th>
                <th scope="col">Montant négocié</th>
                <th scope="col">Etat</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

            @foreach($negotiations as $negotiation)
            <tr>
                <th scope="row">{{$negotiation->created_at}}</th>
                <td>{{$negotiation->client->firstname}}</td>
                <td>{{$negotiation->type}}</td>
                <td>{{$negotiation->amout_negociated}}</td>
                <td>{{$negotiation->state}}</td>
                <td><a href="/negotiations/{{$negotiation->id}}" class="button">Voir</a></td>
            </tr>
            @endforeach

    </table>

</div>


@endcomponent