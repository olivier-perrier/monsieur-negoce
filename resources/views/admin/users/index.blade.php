@component('layouts.exmachina')

<div class="container">

    <div class="row">

        <!-- Négociateurs -->
        <div class="col-md-6">

            <h3 class="title">Négociateurs</h3>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($negotiators as $negotiator)

                        <tr>
                            <th scope="row">N° {{$negotiator->id}}</th>
                            <td>{{ $negotiator->firstname }} {{ $negotiator->lastname }}</td>
                            <td><a href="/users/{{ $negotiator->id }}" class="btn btn-link p-0">Voir</a></td>
                            <!-- Validation -->
                            <td>
                                @if(!$negotiator->validated)
                                <form method="POST" action="/admin/users/{{ $negotiator->id }}/validate">
                                    @csrf
                                    <button type="submit" class="btn btn-link">Valider</button>
                                </form>
                                @else
                                Validé !
                                @endif
                            </td>
                            <!-- Suppression -->
                            <td>
                                <form method="POST" action="/admin/users/{{ $negotiator->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Supprimer</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <!-- FIN NEGOCIATEURS -->

        <!-- Clients -->
        <div class="col-md-6">

            <h3 class="title">Clients</h3>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($clients as $client)

                        <tr>
                            <th scope="row">N° {{$client->id}}</th>
                            <td>{{ $client->firstname }} {{ $client->lastname }}</td>
                            <td><a href="/users/{{ $client->id }}" class="btn btn-link p-0">Voir</a></td>
                            <!-- Suppression -->
                            <td>
                                <form method="POST" action="/admin/users/{{ $client->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Supprimer</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        <!-- FIN CLIENTS -->

    </div>

</div>

@endcomponent