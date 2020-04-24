<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title' => 'Travaux au domicile principal']);
        Category::create(['title' => 'Travaux au domicile secondaire']);
        Category::create(['title' => 'Travaux de cuisine']);
        Category::create(['title' => 'Travaux salle de bain']);
        Category::create(['title' => 'Rénovation']);
        Category::create(['title' => 'Descruction']);
    }
}
