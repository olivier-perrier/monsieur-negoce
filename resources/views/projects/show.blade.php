@component('layouts.exmachina')

<div class="container my-3">

    <div class="alert alert-success" role="alert">
        <p>{{ $project->client->firstname }} {{ $project->client->lastname }} n°suivi {{ $project->id }} - {{ $project->category->title }}</p>
    </div>

    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-md-4">
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
            <div class="col-md-8">

                <div class="card">

                    <x-fileDepot :project="$project" :files="$files"/>

                    <div class="card-body">

                        <!-- Suivi de la négociation -->
                        <h5 class="title is-5 text-center">Suivi de la négociation</h5>

                        @if($project->notes->count())
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
                        @else
                        <span class="m-1">Suivez ici les commentaires ajouté par le négociateur</span>
                        @endif
                        <!-- FIN SUIVI DE LA NEGOCIATION -->

                    </div>
                </div>

                <!-- Etapes d'avancement de la négociation -->
                <div class="card mt-3">
                    <div class="card-content">
                        <h5 class="title is-5 text-center">Avancement de la demande de négociation</h5>
                        <div class="row text-center">
                            @foreach($states as $state)
                            @if($state->id === $project->state_id)
                                <div class="col-md box text-{{ $state->level }}">
                                    <strong>{{$state->step}}</strong><br>
                                    {{$state->title}}
                                </div>
                            @else
                            <div class="col-md">
                                <strong>{{$state->step}}</strong><br>
                                    {{$state->title}}
                                </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <!-- ROW -->
        </div>
    </section>

    @can('admin')
    <section class="mt-3">

        <div class="box">
            <h3 class="title text-danger ">Administration</h3>

            <form method="POST" action="{{ route('admin.projects.update', $project->id) }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label mr-1 ">Etapes d'avancement</label>
                    <div class="control">
                        <div class="select">
                            <select name="state">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id}}"
                                        {{ $state->id === $project->state_id ? 'selected' : '' }}>
                                        {{ $state->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Montant négocié</label>
                    <div class="control">
                        <input class="input" type="number" name="amount_negotiated" value="{{ $project->amount_negotiated }}" placeholder="0">
                    </div>
                    <p class="help">Montant négocié une fois le devis du négociateur déposé. Ce montant servira à la facturation du négociateur par le client.</p>
                    <p class="help">Montant à exprimer dans la même devise que celle du devis</p>
                </div>

                <div class="field">
                    <label class="label">Taxe pour le négociateur (%)</label>
                    <div class="control">
                        <input class="input" type="number" step="0.01" min="0" max="100" placeholder="0" name="fee_negotiator_pourcent" value="{{ $project->fee_negotiator_pourcent }}">
                    </div>
                    <p class="help">Taxe appliquée au montant négocié qui sera bénéficiée par le négociateur.</p>
                </div>


                <button type="submit" class="button is-primary">Sauvegarder</button>

            </form>

        </div>
    </section>
    @endcan

</div>



@endcomponent