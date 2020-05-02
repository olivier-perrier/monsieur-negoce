<div class="card">
    {{-- <div class="card-body"> --}}

    @can('negotiator')
    <div class="card-body">
        <h5 class="">Profil du client</h5>
        <p>{{ $project->client->firstname }} {{ $project->client->lastname }}</p>
        <p>{{ $project->client->address->street }} </p>
        <p>{{ $project->client->address_postcode }} {{ $project->client->address_city }}</p>
        <p>{{ $project->client->phone }}</p>
        <p>{{ $project->client->email }}</p>
    </div>
    @endcan

    <div class="card-body">
        <h5 class="">Informations de l'entreprise</h5>
        @if($project->contactAddress)
        <h6 class="card-subtitle mb-2 text-muted">{{ $project->contactAddress->company_name }}</h6>
        <p>{{ $project->contactAddress->person_name }}</p>
        <p>{{ $project->contactAddress->street }}</p>
        <p>{{ $project->contactAddress->postcode }} {{ $project->contactAddress->city }}</p>
        <p>{{ $project->contactAddress->phone }}</p>
        <p>{{ $project->contactAddress->email }}</p>
        @else
        <p> - </p>
        @endif
    </div>

    <div class="card-body border-top">
        <h5 class="">Demande du client</h5>
        {{ $project->description }}
    </div>
    {{-- </div> --}}
</div>