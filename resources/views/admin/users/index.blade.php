@component('layouts.exmachina')

<div class="container">

    <div class="row">

        <!-- Négociateurs -->
        <div class="col-md-6">

            <h3 class="">Négociateurs</h3>

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
                            <!-- Suppression -->
                            <td>
                                <form method="POST" action="{{ route('admin.users.delete', $negotiator->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"><i class="far fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>
                            <td><a href="{{ route('users.show', $negotiator->id) }}" class="btn btn-link p-0"><i class="fas fa-chevron-right"></i></a></td>
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
                            <!-- Suppression -->
                            <td>
                                <form method="POST" action="{{ route('admin.users.delete', $client->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"><i class="far fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>
                            <td><a href="{{ route('users.show', $negotiator->id) }}" class="btn btn-link p-0"><i class="fas fa-chevron-right"></i></a></td>

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