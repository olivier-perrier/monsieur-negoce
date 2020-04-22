@component('layouts.exmachina')

<div class="container">
    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Informations de l'entreprise</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $project->company_name }}</h6>
                        Adresse de l'entreprise
                    </div>
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Demande du client</h5>
                        {{ $project->description }}
                    </div>
                </div>
            </div>

            <!-- Document avec suivi des négociations -->
            <div class="col-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Documents disponible(s)
                            <a href="#" class="button ml-5 mb-1">Ajouter un document</a>
                        </h5>

                        <!-- Suivi de la négociation -->
                        <h5 class="card-title">Suivi de la négociation</h5>

                        <table class="table table-sm table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type d'information</th>
                                    <th scope="col">Note</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($project->notifications as $notification)
                                <tr>
                                    <td>{{ $notification->created_at }}</td>
                                    <td>{{ $notification->type }}</td>
                                    <td>{{ $notification->content }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- FIN SUIVI DE LA NEGOCIATION -->

                        <!-- Ajoute d'une note pour les négociateurs -->
                        @if( App\User::find(1)->isNegotiator() )

                        <form method="POST" action="/notifications?project={{ $project->id }}" class="form-inline">
                            @csrf

                            <div class="form-group mx-2 mb-2">
                                <input type="text" class="form-control" name="content">
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info mb-2">Ajouter une note</button>
                            <small class="form-text text-muted ml-1">Ajoutez une note de l'avancement de la négociation pour le client.</small>
                        </form>

                        @endif
                        <!-- FIN AJOUT NOTE NEGOCIATEUR -->

                    </div>
                </div>

                <!-- Etapes d'avancement de la négociation -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Avancement de la demande de négociation</h5>
                        <p class="card-text">-</p>
                    </div>
                </div>
            </div>


            <!-- ROW -->
        </div>


        <!-- <a href="/projects/{{$project->id}}/edit" class="button">Edit</a> -->

    </section>
</div>



@endcomponent