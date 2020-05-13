<?php

use App\Cashing;
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

        // Catégories
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Travaux de la maison']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Rénovation complète']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Rénovation sol']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Chauffage / Climatisation']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Toiture']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Véranda']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Piscine']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Maçonnerie']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Autres travaux']);

        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Immobilier']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Achat /Vente']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Construction']);
        
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Ameublement / Produit de valeur']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Véhicule']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Achat de voiture']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Maçonnerie']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Achat de moto']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Achat de camion / utilitaire']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Achat de pièces détachées']);

        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Services entreprises / Établissements divers']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => '- Achat de matériel']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Travaux']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Autres demandes']);

        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Événementiels']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Mariage']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Salons professionnels']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Séminaires']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Autres événements']);

        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Publicité']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Création de site internet']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Création d’application']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Publicité sur lieu de vente']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Stratégie marketing']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Campagne publicitaire']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Autres publicité']);
        
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Agent professionnel']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Sportif, acteur, musicien']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Influenceur']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Autre']);
        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => ' - Séminaires']);

        DB::table('metas')->insert(['key' => 'CATEGORY', 'value' => 'Autre demande']);
        
        // Note types
        DB::table('metas')->insert(['key' => 'NOTE_TYPE', 'value' => 'Contact entreprise']);
        DB::table('metas')->insert(['key' => 'NOTE_TYPE', 'value' => 'Ajout devis']);
        DB::table('metas')->insert(['key' => 'NOTE_TYPE', 'value' => 'Avancement état']);

        // Cashings states
        DB::table('metas')->insert(['key' => 'STATE_CASHING', 'value' => Cashing::$STATE_EN_COURS]);
        DB::table('metas')->insert(['key' => 'STATE_CASHING', 'value' => Cashing::$STATE_REVERSE]);
    }
}
