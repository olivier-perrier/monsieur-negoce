<?php

use App\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'step' => 1,
            'title' => "En cours de traitement",
            'description' => "Dossier en cours de traitement, nous prenons connaissance de votre demande, un négociateur vous sera attribué prochainement.",
            'level' => "info"
        ]);

        State::create([
            'step' => 2,
            'title' => "En cours de négociation",
            'description' => "Dossier pris en charge par un de nos négociateurs.",
            'level' => "warning"
        ]);

        State::create([
            'step' => 3,
            'title' => "Négociation réussie",
            'description' => "La négociation a été concluante, votre règlement est requis pour finaliser ce projet",
            'level' => "primary"
        ]);

        State::create([
            'step' => 4,
            'title' => "Négociation terminée",
            'description' => "Dossier terminé avec succès.",
            'level' => "success"
        ]);

        State::create([
            'step' => 5,
            'title' => "Négociation échouée",
            'description' => "La négociation a échoué, aucune action de votre part n'est requise.",
            'level' => "danger"
        ]);
    }
}
