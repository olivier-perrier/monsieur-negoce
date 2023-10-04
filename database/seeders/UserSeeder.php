<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['role' => 'client', 'email' => 'client@monsieur-negoce.com']);
        User::factory()->create(['role' => 'negotiator', 'email' => 'nego@monsieur-negoce.com']);
        User::factory()->create(['role' => 'administrator', 'email' => 'admin@monsieur-negoce.com']);

        User::factory(3)->create(['role' => 'client']);
        User::factory(3)->create(['role' => 'negotiator']);
    }
}
