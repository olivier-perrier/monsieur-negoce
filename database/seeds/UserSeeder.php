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
        factory(App\User::class)->create(['role' => 'client', 'email' => 'client@gmail.com']);
        factory(App\User::class)->create(['role' => 'negotiator', 'email' => 'nego@gmail.com']);
        factory(App\User::class)->create(['role' => 'administrator', 'email' => 'admin@gmail.com']);

        factory(App\User::class, 10)->create();

    }
}
