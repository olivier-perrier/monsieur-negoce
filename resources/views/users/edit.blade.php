@component('layouts.exmachina')
{{-- @extends('layouts.main') --}}

@section('content')

<div class="container my-5">
    <h3 class="col-md-10 mx-auto">Modifier mon profil</h3>

    <form method="POST" action="{{ route('users.update', $user->id) }}" class="box col-md-10 mx-auto">
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

        <div class="form-group w-50">
            <label for="birthday">Date de naissance</label>
            <input type="date" class="form-control" name="birthday" value="{{$user->birthday}}">
        </div>

        <!-- Nationalité -->
        <div class="form-group w-50">
            <label for="nationality">Nationalité</label>
            <input type="text" class="form-control" name="nationality" value="{{$user->nationality}}">
            @error('nationality')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address_street">Adresse</label>
            <input type="text" class="form-control" name="address_street" value="{{$address->street}}">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address_postcode">Code postal</label>
                <input type="text" class="form-control" name="address_postcode" value="{{$address->postcode}}">
            </div>
            <div class="form-group col-md-6">
                <label for="address_city">Ville</label>
                <input type="text" class="form-control" name="address_city" value="{{$address->city}}">
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
                <input type="phone" class="form-control" name="phone" value="{{$user->phone}}">
            </div>
        </div>

        {{-- Pour les encaissements --}}
        @can('negotiator')

        <div class="mt-3">
            <h3 class="">Mes encaissements</h3>

            <!-- IBAN -->
            <div class="form-group">
                <label for="bank_iban">N°IBAN</label>
                <input type="text" class="form-control" name="bank_iban" value="{{ $bank->iban }}">
            </div>

            <div class="form-group">
                <label for="bank_swift">Code SWIFT</label>
                <input type="text" class="form-control" name="bank_swift" value="{{ $bank->swift }}">
            </div>

            <div class="form-group">
                <label for="bank_name">Nom de votre banque</label>
                <input type="text" class="form-control" name="bank_name" value="{{ $bank->name }}">
            </div>

            <div class="form-group">
                <label for="bank_address">Adresse de la Banque</label>
                <input type="text" class="form-control" name="bank_address" value="{{ $bank->address }}">
            </div>

        </div>

        @endcan

        <button type="submit" class="btn btn-danger">Sauvegarder mon profil</button>

    </form>

</div>

{{-- @endsection --}}


@endcomponent