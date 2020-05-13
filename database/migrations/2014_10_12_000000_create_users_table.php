<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->enum('role', ['client', 'negotiator', 'administrator']);
            $table->string('firstname');
            $table->string('lastname');
            $table->foreignId('address_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('sponsor')->nullable();
            $table->boolean('validated')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('SET NULL');

        });

        // Factory(App\User::class)->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
