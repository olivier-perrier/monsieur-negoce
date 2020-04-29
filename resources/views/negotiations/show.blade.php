@component('layouts.exmachina')

<div class="container my-3">

    <x-projects.header :project="$negotiation"/>

    <section>
        <div class="row">

            <!-- Informations de l'entreprise avec demande client -->
            <div class="col-4">
                <x-projects.description :project="$negotiation" />
            </div>

            <!-- Document avec suivi des négociations -->
            <div class="col-8">

                <div class="card">
                    
                    <div class="card-body">

                        <!-- Documents -->
                        <x-projects.files :project="$negotiation" :files="$files" />
                        
                        <!-- Suivi de la négociation -->
                        <x-projects.notes :project="$negotiation" :notes="$negotiation->notes" />

                    </div>


                </div>

                <!-- Etapes d'avancement de la négociation -->
                <x-projects.steps :project="$negotiation" :states="$states" />

            </div>


        </div>
        <!-- ROW -->

    </section>
</div>



@endcomponent