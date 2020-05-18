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
                        <x-fields.input-bulma label="Prénom" name="firstname" :value="$user->firstname" icon="fas fa-user" />
                    </div>
                    <div class="form-group col-md-6">
                        <x-fields.input-bulma label="Nom" name="lastname" :value="$user->lastname" icon="fas fa-users" />
                    </div>
                </div>

                <!-- Address -->
                <x-fields.input-bulma name="address_street" :value="$address->street" label="Adresse" icon="fas fa-map-marker-alt" />


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-fields.input-bulma label="Code postal" name="address_postcode" :value="$address->postcode" icon="fas fa-map-marker-alt" />
                    </div>
                    <div class="form-group col-md-6">
                        <x-fields.input-bulma label="Ville" name="address_city" :value="$address->city" icon="fas fa-map-marker-alt" />
                    </div>
                </div>

                <!-- Email et Phone -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-fields.input-bulma label="Email" name="email" :value="$user->email" icon="fas fa-envelope" />
                    </div>
                    <div class="form-group col-md-6">
                        <x-fields.input-bulma label="Téléphone" name="phone" :value="$user->phone" icon="fas fa-phone" />
                    </div>
                </div>

                {{-- Pour les encaissements --}}
                @can('negotiator')

                <div class="my-3">
                    <h3 class="">Mes encaissements</h3>

                    <x-fields.input-bulma label="N°IBAN" name="bank_iban" :value="$bank->iban" icon="fas fa-money-check" />

                    <x-fields.input-bulma label="Code SWIFT" name="bank_swift" :value="$bank->swift" icon="fas fa-money-check" />

                    <x-fields.input-bulma label="Nom de votre banque" name="bank_name" :value="$bank->name" icon="fas fa-university" />

                    <x-fields.input-bulma label="Adresse de la Banque" name="bank_address" :value="$bank->address" icon="fas fa-map-marker-alt" />

                </div>

                @endcan

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-danger">Sauvegarder mon profil</button>
                    </div>
                </div>

            </form>

        </div>


    </div>


</div>

{{-- @endsection --}}


@endcomponent