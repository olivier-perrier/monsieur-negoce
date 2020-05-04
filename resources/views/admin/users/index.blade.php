@component('layouts.site')

<div class="container">

    <div class="row">

        <!-- Négociateurs -->
        <div class="col-md-6">

            <h3 class="">Négociateurs</h3>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th> <!-- Supression -->
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom</th>
                            <th scope="col"></th> <!-- Valider -->
                            <th scope="col"></th> <!-- Encaissements -->
                            <th scope="col"></th> <!-- Parrainage -->
                            <th scope="col"></th> <!-- Voir -->
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($negotiators as $negotiator)

                        <tr>
                            <!-- Suppression -->
                            <td>
                                <form method="POST" action="{{ route('admin.users.delete', $negotiator->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"><i
                                            class="far fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>
                            <th scope="row">N° {{$negotiator->id}}</th>
                            <td><a href="{{ route('users.show', $negotiator->id) }}" class="btn btn-link p-0">
                                    {{ $negotiator->firstname . ' ' . $negotiator->lastname }}
                                </a>
                            </td>
                            <!-- Validation -->
                            <td class="text-center">
                                @if(!$negotiator->validated)
                                <form method="POST" action="{{ route('admin.users.validate', $negotiator->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0">Valider</button>
                                </form>
                                @else
                                <i class="fas fa-user-check text-success"></i>
                                @endif
                            </td>

                            <td><a href="{{ route('users.cashings.index', $negotiator->id) }}"
                                    class="btn btn-link p-0"><i class="fas fa-euro-sign"></i></a>
                            </td>
                            <td><a href="{{ route('users.sponsors.show', $negotiator->id) }}"
                                    class="btn btn-link p-0"><i class="fas fa-user-friends"></i></a></td>
                            <td><a href="{{ route('users.show', $negotiator->id) }}" class="btn btn-link p-0"><i
                                        class="fas fa-chevron-right"></i></a></td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <!-- FIN NEGOCIATEURS -->

        <!-- Clients -->
        <div class="col-md-6">

            <h3 class="">Clients</h3>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>   <!-- Supression -->
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom</th>
                            <th scope="col"></th>   <!-- Parrainage -->
                            <th scope="col"></th>   <!-- Voir -->
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($clients as $client)

                        <tr>
                            <!-- Suppression -->
                            <td>
                                <form method="POST" action="{{ route('admin.users.delete', $client->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"><i
                                            class="far fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>
                            <th scope="row">N° {{$client->id}}</th>
                            <td><a href="{{ route('users.show', $client->id) }}" class="btn btn-link p-0">
                                    {{ $client->firstname . ' ' . $client->lastname }}
                                </a>
                            </td>
                            <td><a href="{{ route('users.sponsors.show', $negotiator->id) }}"
                                    class="btn btn-link p-0"><i class="fas fa-user-friends"></i></a></td>
                            <td><a href="{{ route('users.show', $negotiator->id) }}" class="btn btn-link p-0"><i
                                        class="fas fa-chevron-right"></i></a></td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <!-- FIN CLIENTS -->

    </div>

    <div class="box">
        <p> Le symbole <i class="fas fa-euro-sign"></i> correspond aux encaissements</p>
        <p> Le symbole <i class="fas fa-user-friends"></i> correspond aux parrainages</p>
        <p> Le symbole <i class="fas fa-user-check text-success"></i> correspond à un utilisateur validé</p>
        <p> Le symbole <i class="fas fa-chevron-right"></i> correspond au lien vers l'utilisateur</p>
        <p> Le symbole <i class="far fa-trash-alt text-danger"></i> correspond au lien pour supprimer l'utlisateur</p>
    </div>

</div>

@endcomponent