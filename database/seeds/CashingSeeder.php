<?php

use Illuminate\Database\Seeder;

class CashingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cashing::class, 20)->create();
    }
}
