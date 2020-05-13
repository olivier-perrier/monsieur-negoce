@component('layouts.site')

<div class="container my-3">

    <div class="col-md-10 mx-auto">

        <h3 class="mb-2">Modifier mon profil</h3>

        <div class="card card-body">

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">Prénom</label>
                        <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Nom</label>
                        <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address[street]"><b>Adresse</b></label>
                    <input type="text" class="form-control" name="address[street]" value="{{$address->street}}">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address[postcode]">Code postal</label>
                        <input type="text" class="form-control" name="address[postcode]" value="{{$address->postcode}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address[city]">Ville</label>
                        <input type="text" class="form-control" name="address[city]" value="{{$address->city}}">
                    </div>
                </div>

                <!-- Email et Phone -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Téléphone</label>
                        <input type="phone" class="form-control" name="phone" value="{{$user->phone}}" maxlength="10">
                    </div>
                </div>

                {{-- Pour les encaissements --}}
                @can('negotiator')

                <div class="mt-3">
                    <h3 class="">Mes encaissements</h3>

                    <x-fields.input name="bank[iban]" :value="$bank->iban" label="N°IBAN"/>

                    <x-fields.input name="bank[swift]" :value="$bank->swift" label="Code SWIFT"/>

                    <x-fields.input name="bank[name]" :value="$bank->name" label="Nom de votre banque"/>

                    <x-fields.input name="bank[address]" :value="$bank->address" label="Adresse de la Banque"/>

                </div>

                @endcan

                <button type="submit" class="btn btn-danger">Sauvegarder mon profil</button>

            </form>

        </div>


    </div>


</div>

{{-- @endsection --}}


@endcomponent