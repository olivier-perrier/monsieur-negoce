@component('layouts.exmachina')

<div class="container">
    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Informations de l'entreprise</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $project->company_name }}</h6>
                        Adresse de l'entreprise
                    </div>
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Demande du client</h5>
                        {{ $project->description }}
                    </div>
                </div>
            </div>

            <!-- Document avec suivi des négociations -->
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Documents disponible(s)
                            <a href="#" class="button ml-5 mb-1">Ajouter un document</a>
                        </h5>
                        <h5 class="card-title">Suivi de la négociation</h5>
                        <p class="card-text">-</p>
                    </div>
                </div>

                <!-- Etapes d'avancement de la négociation -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title border-bottom">Avancement de la demande de négociation</h5>
                        <p class="card-text">-</p>
                    </div>
                </div>
            </div>


            <!-- ROW -->
        </div>


        <!-- <a href="/projects/{{$project->id}}/edit" class="button">Edit</a> -->

    </section>
</div>



@endcomponent