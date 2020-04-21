@component('layouts.exmachina')


<div class="container">
    <h1>Nouveau projet</h1>


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
                        <option value="1">Travaux au domicile principal</option>
                        @foreach($categories ?? [] as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="excerpt">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" row=10>{{old('description')}}</textarea>
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

            <div class="col-md-6">

                <div class="form-group">
                    <label for="title">Ajoutez le nom de l'entreprise concernée</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{old('company_name')}}">
                    @error('company_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Adresse entreprise -->
                <div class="form-group">
                    <label for="company_adress">Indiquez l'adresse de l'entreprise concernée</label>
                    <input type="text" class="form-control @error('company_adress') is-invalid @enderror" name="company_adress" value="{{old('company_adress')}}">
                    @error('company_adress')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Personne rencontrée -->
                <div class="form-group">
                    <label for="company_person_met">Indiquez le nom de la personne rencontrée</label>
                    <input type="text" class="form-control @error('company_person_met') is-invalid @enderror" name="company_person_met" value="{{old('company_person_met')}}">
                    @error('company_person_met')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <!-- COL -->

        </div>
        <!-- ROW -->

        <div style="text-align:right;">
            <input class="btn btn-warning" type="submit" value="Valider">
        </div>


</div>


</form>
</div>
@endcomponent