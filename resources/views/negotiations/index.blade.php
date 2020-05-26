@component('layouts.site')


<div class="container my-5">

    <h3 class="">Mes négociations</h3>

    <div class="box">
        @if($negotiations->count())
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
                        <td>{{$negotiation->created_at}}</td>
                        <td>{{$negotiation->client->firstname}} {{$negotiation->client->lastname}}</td>
                        <td>{{$negotiation->category->value | replace:" - "}}</td>
                        <td>{{$negotiation->amount_negotiated ? $negotiation->amount_negotiated . ' €' : '-'}}</td>
                        <td>
                            <x-projects.badge-state :state="$negotiation->state" />
                        </td>
                        <td><a href="{{ route('projects.show', $negotiation->id) }}" class="btn btn-link"><i class="fas fa-chevron-right"></i></a></td>
                    </tr>
                    @endforeach

            </table>

        </div>

        @else
        Vos négociations apparaitront ici.
        @endif
    </div>
</div>


@endcomponent