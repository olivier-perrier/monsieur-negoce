@component('layouts.exmachina')

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Identifiant</th>
                <th scope="col">Role</th>
                <th scope="col">Nom</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

            @foreach($clients as $client)

            <tr>
                <th scope="row">N° {{$client->id}}</th>
                <th scope="row">{{$client->role}}</th>
                <td>{{ $client->firstname }} {{ $client->lastname }}</td>
                <td><a href="/users/{{ $client->id }}" class="btn btn-link p-0">Voir</a></td>
                <!-- Validation -->
                <td>
                    @if($client->role ==="negotiator")
                    @if(!$client->validated)
                    <form method="POST" action="/admin/users/{{ $client->id }}/validate">
                        @csrf
                        <button type="submit" class="btn btn-link">Valider</button>
                    </form>
                    @else
                    Validé !
                    @endif
                    @endif
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>



@foreach($clients as $client)


{{ $client->role }} - {{ $client->firstname }} {{ $client->lastname }} -
<a href="/users/{{ $client->id }}" type="link">Voir</a>
@if($client->role ==="negotiator" & !$client->validated)
<form method="POST" action="/admin/users/{{ $client->id }}/validate" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-link">Valider</button>
</form>
@endif
<br>

@endforeach

@endcomponent