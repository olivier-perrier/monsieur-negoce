@component('layouts.exmachina')


<div class="container">
    <h1>Mon profil</h1>


    <form method="POST" action="/users/{{$user->id}}" class="p-4 border rounded-lg shadow-sm">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">Prénom</label>
                <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
            </div>
            <div class="form-group col-md-6">
                <label for="family_name">Nom</label>
                <input type="text" class="form-control" name="family_name" value="{{$user->family_name}}">
            </div>
        </div>

        <div class="form-group">
            <label for="birthday">Date de naissance</label>
            <input type="date" class="form-control" name="birthday" value="{{$user->birthday}}">
        </div>

        <!-- Adresse -->
        <div class="form-group">
            <label for="adress">Adresse</label>
            <input type="text" class="form-control" name="adress" value="{{$user->adress}}">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="adress_post_code">Code postal</label>
                <input type="text" class="form-control" name="adress_post_code" value="{{$user->d}}">
            </div>
            <div class="form-group col-md-6">
                <label for="adress_city">Ville</label>
                <input type="text" class="form-control" name="adress_city" value="{{$user->adress_city}}">
            </div>
        </div>

        <!-- Email et Phone -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" >
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Téléphone</label>
                <input type="phone" class="form-control" name="phone">
            </div>
        </div>

        <button type="submit" class="btn btn-danger">Sauvegarder mon profil</button>

    </form>

</div>


@endcomponent