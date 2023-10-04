<?php

namespace Database\Seeders;

use App\Cashing;
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
        Cashing::factory(20)->create();
    }
}
