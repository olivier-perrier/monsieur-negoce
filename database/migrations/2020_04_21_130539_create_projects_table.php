<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('client_id');
            $table->foreignId('negotiator_id');
            // -> Categorie
            $table->string('company_name');
            // -> Adresse
            $table->text('description');
            // -> Devis
            // -> Type de contact
            // -> Etat
            // $table->string('state');
            $table->timestamps();
            
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('negotiator_id')->references('id')->on('users');


        
        });

        Factory(App\Project::class)->create();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
