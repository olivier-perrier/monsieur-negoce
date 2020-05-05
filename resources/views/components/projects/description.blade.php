<div class="card mb-3">
    {{-- <div class="card-body"> --}}

    @can('negotiator')
    <div class="card-body">
        <h5 class="">Profil du client</h5>
        <address>
            <p>{{ $project->client->fullname() }} </p>
            @if($project->client->address)
            <p>{{ $project->client->address->street }} </p>
            <p>{{ $project->client->address->postcode }} {{ $project->client->address->city }}</p>
            @endif
            <p>{{ $project->client->phone }}</p>
            <p>{{ $project->client->email }}</p>
        </address>
    </div>
    @endcan

    <div class="card-body">
        <h5 class="">Informations de l'entreprise</h5>

        <address>
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
        </address>

    </div>

    <div class="card-body border-top">
        <h5 class="">Demande du client</h5>
        {{ $project->description }}
    </div>
    {{-- </div> --}}
</div>

<style scoped>
    p {
        margin-bottom: 0em
    }
</style>