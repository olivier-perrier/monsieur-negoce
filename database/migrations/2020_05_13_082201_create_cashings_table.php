<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashings', function (Blueprint $table) {
            $table->id();
            $table->float('amount')->nullable();
            $table->float('taxe')->nullable();
            $table->float('net_amount')->nullable();
            $table->foreignId('state_id')->nullable();

            $table->foreignId('user_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('metas')->onDelete('SET NULL');

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashings');
    }
}
