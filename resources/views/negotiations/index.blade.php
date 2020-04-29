@component('layouts.exmachina')


<div class="container my-5">

    <h3 class="title">Mes négociations</h3>

    <div class="box">
        <div class="table-responsive">
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
                        <th>{{$negotiation->created_at}}</th>
                        <td>{{$negotiation->client->firstname}} {{$negotiation->client->lastname}}</td>
                        <td>{{$negotiation->category->title}}</td>
                        <td>{{$negotiation->amout_negociated }}</td>
                        <td><span class="tag is-{{ $negotiation->state->level }} is-rounded">{{ $negotiation->state->title }}</span></td>
                        <td><a href="{{ route('negotiations.show', $negotiation->id) }}" class="btn btn-link">></a></td>
                    </tr>
                    @endforeach

            </table>

        </div>
    </div>
</div>


@endcomponent