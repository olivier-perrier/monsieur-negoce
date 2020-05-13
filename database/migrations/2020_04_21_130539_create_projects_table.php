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
            $table->foreignId('client_id')->nullable();
            $table->foreignId('negotiator_id')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('address_contact_id')->nullable();    // Contact address
            $table->text('description');
            $table->float('amount_negotiated')->nullable();
            $table->foreignId('state_id');
            $table->timestamps();
            

            $table->foreign('client_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('negotiator_id')->references('id')->on('users')->onDelete('set null');

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('category_id')->references('id')->on('metas');

            $table->foreign('address_contact_id')->references('id')->on('addresses')->cascadeOnDelete();

        
        });

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
