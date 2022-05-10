@component('layouts.app')


<div class="container my-3">
    <h3 class="">Nouveau projet</h3>


    <form method="POST" action="{{ route('projects.store') }}">
        @csrf

        <div class="row mb-3">

            <div class="col-md-6">

                <div class="box">

                    <x-fields.input-bulma label="Nom de votre projet" name="name" :value="old('name')" icon="fas fa-file-alt" />

                    <!-- Categorie -->
                    <div class="form-group">
                        <label for="body">Sélectionnez la catégorie de votre choix</label>
                        <select class="custom-select" name="category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{$category->value}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
 
                    <!-- Description -->
                    <div class="form-group">
                        <label for="excerpt">Description</label>
                        <textarea class="form-control" name="description" rows="8">{{old('description')}}</textarea>
                        @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="file-cta">
                            <span class="file-icon"><i class="fas fa-file-upload"></i></span>
                            <span class="file-label">Devis</span>
                        </div>
                        <small class="form-text text-muted">Pensez à ajouter un devis sur la page suivante.</small>
                    </div>


                </div>
            </div>

            <!-- Colonne adresse de contact avec l'entreprise -->
            <div class="col-md-6">
                <div class="box">

                    <x-fields.input-bulma label="Ajoutez le nom de l'entreprise concernée" name="address[company_name]" :value="old('address.company_name')" icon="fas fa-building" />

                    <!-- Adresse entreprise -->
                    <x-fields.input-bulma label="Adresse de l'entreprise concernée" name="address[street]" :value="old('address.street')" icon="fas fa-map-marker-alt" />

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <x-fields.input-bulma label="Code postal" name="address[postcode]" :value="old('address.postcode')" icon="fas fa-map-marker-alt" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-fields.input-bulma label="Ville" name="address[city]" :value="old('address.city')" icon="fas fa-map-marker-alt" />
                        </div>
                    </div>

                    <!-- Email et Phone -->
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <x-fields.input-bulma label="Email" name="address[email]" :value="old('address.email')" icon="fas fa-envelope" />
                        </div>
                        <div class="form-group col-md-6">
                            <x-fields.input-bulma label="Téléphone" name="address[phone]" :value="old('address.phone')" icon="fas fa-phone" />
                        </div>
                    </div>

                    <!-- Personne rencontrée -->
                    <div class="form-group">
                        <x-fields.input-bulma label="Indiquez le nom de la personne rencontrée" name="address[person_name]" :value="old('address.person_name')" icon="fas fa-user-friends" />
                    </div>

                </div>
            </div>
            <!-- COL ADDRESS CONTACT-->

        </div>
        <!-- ROW -->

        <div style="text-align:right;">
            <input class="btn btn-warning" type="submit" value="Valider">
        </div>


</div>


</form>
</div>
@endcomponent