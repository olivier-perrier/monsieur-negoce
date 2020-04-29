@component('layouts.exmachina')

<div class="container my-3">

    <div class="alert alert-success" role="alert">
        <p>{{ $project->client->firstname }} {{ $project->client->lastname }} n°suivi {{ $project->id }} - {{ $project->category->title }}</p>
    </div>

    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="title is-5">Informations de l'entreprise</h5>
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
                    <div class="card-content border-top">
                        <h5 class="title is-5">Demande du client</h5>
                        {{ $project->description }}
                    </div>
                </div>
            </div>

            <!-- Document avec suivi des négociations -->
            <div class="col-8">

                <div class="card">

                    <x-fileDepot :project="$project" :files="$files"/>

                    <div class="card-body">

                        <!-- Suivi de la négociation -->
                        <h5 class="is-6">Suivi de la négociation</h5>

                        <table class="table table-sm table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type d'information</th>
                                    <th scope="col">Note</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($project->notes as $note)
                                <tr>
                                    <td>{{ $note->created_at }}</td>
                                    <td>{{ $note->type }}</td>
                                    <td>{{ $note->content }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- FIN SUIVI DE LA NEGOCIATION -->

                    </div>
                </div>

                <!-- Etapes d'avancement de la négociation -->
                <div class="card mt-3">
                    <div class="card-content">
                        <h5 class="title is-5 text-center">Avancement de la demande de négociation</h5>
                        <div class="row text-center">
                            @foreach($states as $state)
                            <div class="col-md">
                                <strong>{{$state->step}}</strong><br>
                                {{$state->title}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <!-- ROW -->
        </div>

    </section>
</div>



@endcomponent