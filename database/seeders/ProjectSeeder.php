<?php

namespace Database\Seeders;

use App\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(5)->create(['client_id' => 1, 'negotiator_id' => 2]);

        Project::factory(5)->create();
    }
}
