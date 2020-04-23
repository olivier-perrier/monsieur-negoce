@component('layouts.exmachina')


<div class="container">
    <h1>Mon profil</h1>


    <form method="POST" action="/users/{{$user->id}}" class="p-4 border rounded-lg shadow-sm">
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
            <div class="invalid-feedback">{{$errors->first('nationality')}}</div>
            @enderror
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" name="address" value="{{$user->address}}">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address_postcode">Code postal</label>
                <input type="text" class="form-control" name="address_postcode" value="{{$user->address_postcode}}">
            </div>
            <div class="form-group col-md-6">
                <label for="address_city">Ville</label>
                <input type="text" class="form-control" name="address_city" value="{{$user->address_city}}">
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

        <button type="submit" class="btn btn-danger">Sauvegarder mon profil</button>

    </form>

</div>


@endcomponent