@component('layouts.exmachina')


<div class="container my-3">
    <h3 class="title">Nouveau projet</h3>


    <form method="POST" action="/projects">
        @csrf

        <div class="row">

            <div class="col-md-6">

                <div class="form-group">
                    <label for="name">Nom de votre projet</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Categorie -->
                <div class="form-group">
                    <label for="body">Sélectionnez la catégorie de votre choix</label>
                    <select class="custom-select @error('category') is-invalid @enderror" name="category">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="excerpt">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Devis -->
                <div class="form-group">
                    <label for="devisFile">Vous diposez d'un devis, transmettez-le.</label>
                    <input type="file" class="form-control-file" id="devisFile">
                    <small class="text-muted">Ajouter une ou plusiuers pièces (facultatif).</small>
                </div>

            </div>

            <!-- Colonne adresse de contact avec l'entreprise -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="address_company_name">Ajoutez le nom de l'entreprise concernée</label>
                    <input type="text" class="input form-control @error('address_company_name') is-danger @enderror" name="address_company_name" value="{{ old('address_company_name') }}">
                    @error('address_company_name')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Adresse entreprise -->
                <div class="form-group">
                    <label for="address_street">Adresse de l'entreprise concernée</label>
                    <input type="text" class="input form-control @error('address_street') is-danger @enderror" name="address_street" value="{{old('address_street')}}">
                    @error('address_street')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address_postcode">Code postal</label>
                        <input type="text" class="form-control" name="address_postcode" value="{{ old('address_postcode') }}">
                        @error('address_postcode')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address_city">Ville</label>
                        <input type="text" class="form-control" name="address_city" value="{{ old('address_city') }}">
                        @error('address_city')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror</div>
                </div>

                <!-- Email et Phone -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address_email">Email</label>
                        <input type="email" class="form-control" name="address_email" value="{{ old('address_email') }}" required>
                        @error('address_email')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror</div>
                    <div class="form-group col-md-6">
                        <label for="address_phone">Téléphone</label>
                        <input type="phone" class="form-control" name="address_phone" value="{{ old('address_phone') }}">
                        @error('address_phone')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror</div>
                </div>

                <!-- Personne rencontrée -->
                <div class="form-group">
                    <label for="address_person_name">Indiquez le nom de la personne rencontrée</label>
                    <input type="text" class="form-control" name="address_person_name" value="{{ old('address_person_name') }}">
                    @error('address_person_name')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
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