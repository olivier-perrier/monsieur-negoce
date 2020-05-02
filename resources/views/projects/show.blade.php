@component('layouts.app')

<div class="container my-3">

    <x-projects.header :project="$project" />

    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-md-4">

                <x-projects.description :project="$project" />

            </div>

            <!-- Document avec suivi des négociations -->
            <div class="col-md-8">

                <!-- Documents -->
                <x-projects.files :project="$project" :files="$files" />


                <!-- Suivi de la négociation -->
                <x-projects.notes :project="$project" :notes="$project->notes" />


                <!-- Etapes d'avancement de la négociation -->
                <x-projects.steps :project="$project" :states="$states" />

            </div>


        </div>
        <!-- ROW -->

        <!-- Montant négocié -->


    </section>

    <x-projects.admin :project="$project" :states="$states" />

</div>



@endcomponent