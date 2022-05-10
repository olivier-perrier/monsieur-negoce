<?php

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
        factory(App\User::class)->create(['role' => 'client', 'email' => 'client@monsieur-negoce.com']);
        factory(App\User::class)->create(['role' => 'negotiator', 'email' => 'nego@monsieur-negoce.com']);
        factory(App\User::class)->create(['role' => 'administrator', 'email' => 'admin@monsieur-negoce.com']);

        factory(App\User::class, 3)->create(['role' => 'client']);
        factory(App\User::class, 3)->create(['role' => 'negotiator']);

    }
}
