@component('layouts.site')


<div class="container my-3">
    <h3 class="">Nouveau projet</h3>


    <form method="POST" action="{{ route('projects.store') }}">
        @csrf

        <div class="row mb-3">

            <div class="col-md-6">

                <div class="box">

                    <div class="form-group">
                        <label for="name">Nom de votre projet</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

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

                    <div class="form-group">
                        <label>Ajoutez le nom de l'entreprise concernée</label>
                        <input type="text" class="input form-control" name="address[company_name]"
                            value="{{ old('address.company_name') }}">
                        @error('address.company_name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Adresse entreprise -->
                    <div class="form-group">
                        <label>Adresse de l'entreprise concernée</label>
                        <input type="text" class="input form-control" name="address[street]"
                            value="{{old('address.street')}}">
                        @error('address.street')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Code postal</label>
                            <input type="text" class="form-control" name="address[postcode]"
                                value="{{ old('address.postcode') }}">
                            @error('address.postcode')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ville</label>
                            <input type="text" class="form-control" name="address[city]"
                                value="{{ old('address.city') }}">
                            @error('address.city')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror</div>
                    </div>

                    <!-- Email et Phone -->
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="address[email]"
                                value="{{ old('address.email') }}" placeholder="Email" required>
                            @error('address.email')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Téléphone</label>
                            <input type="phone" class="form-control" name="address[phone]"
                                value="{{ old('address.phone') }}">
                            @error('address.phone')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror</div>
                    </div>

                    <!-- Personne rencontrée -->
                    <div class="form-group">
                        <label>Indiquez le nom de la personne rencontrée</label>
                        <input type="text" class="form-control" name="address[person_name]"
                            value="{{ old('address.person_name') }}">
                        @error('address.person_name')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
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