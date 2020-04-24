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
            $table->enum('role', ['client', 'negotiator', 'administrator']);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nationality')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('address_postcode')->nullable();
            $table->string('address_city')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->boolean('validated')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
