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
        factory(App\User::class)->create(['role' => 'client']);
        factory(App\User::class)->create(['role' => 'negotiator']);

        factory(App\User::class, 100)->create();

    }
}
