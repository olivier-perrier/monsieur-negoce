<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MetaSeed::class,
            StateSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class,
            NoteSeeder::class,
            CashingSeeder::class,
        ]);
    }
}
