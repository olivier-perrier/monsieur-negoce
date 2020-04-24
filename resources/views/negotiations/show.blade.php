@component('layouts.exmachina')

<div class="container my-3">

    <article class="message is-info">
        <div class="message-body">{{ $negotiation->client->firstname }} {{ $negotiation->client->lastname }}
            n°suivi {{ $negotiation->id }} - {{ $negotiation->type}}
        </div>
    </article>

    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-4">
                <div class="card">
                    <div class="card-content ">
                        <h5 class="title is-5">Profil du client</h5>
                        <p>{{ $negotiation->client->firstname }} {{ $negotiation->client->lastname }}</p>
                        <p>{{ $negotiation->client->address }} </p>
                        <p>{{ $negotiation->client->address_postcode }} {{ $negotiation->client->address_city }}</p>
                        <p>{{ $negotiation->client->phone }}</p>
                    </div>
                    <div class="card-content">
                        <h5 class="title is-5">Informations de l'entreprise</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $negotiation->company_name }}</h6>
                        Adresse de l'entreprise
                    </div>
                    <div class="card-content border-top">
                        <h5 class="title is-5">Demande du client</h5>
                        {{ $negotiation->description }}
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

                                @foreach($negotiation->notifications as $notification)
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

                        <form method="POST" action="/notifications?negotiation={{ $negotiation->id }}" class="form-inline">
                            @csrf

                            <div class="form-group mx-2 mb-2">
                                <input type="text" class="form-control" name="content">
                                @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info mb-2">Ajouter une note</button>
                            <small class="form-text text-muted ml-1">Ajoutez une note de l'avancement de la négociation du client.</small>
                        </form>

                        @endif
                        <!-- FIN AJOUT NOTE NEGOCIATEUR -->

                    </div>
                </div>

                <!-- Etapes d'avancement de la négociation -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title border-bottom text-center">Avancement de la demande de négociation</h5>
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


        <!-- <a href="/negotiations/{{$negotiation->id}}/edit" class="button">Edit</a> -->

    </section>
</div>



@endcomponent