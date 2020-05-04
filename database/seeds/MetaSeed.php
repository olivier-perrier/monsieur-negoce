<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Travaux au domicile principal']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Travaux au domicile secondaire']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Travaux de cuisine']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Travaux salle de bain']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Rénovation']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Descruction']);

        DB::table('metas')->insert(['key' => 'NOTE_TYPE', 'value' => 'Contact entreprise']);
        DB::table('metas')->insert(['key' => 'NOTE_TYPE', 'value' => 'Ajout devis']);
        DB::table('metas')->insert(['key' => 'NOTE_TYPE', 'value' => 'Avancement état']);
    }
}
