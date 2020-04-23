<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'company_name'];

    public function client()
    {
        return $this->belongsTo(User::class);
    }

    public function negotiator()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public $STATES = [
        [
            'step' => 1,
            'title' => "En cours de traitement",
            'description' => "Dossier en cours de traitement, nous prenons connaissance de votre demande, un négociateur vous sera attribué prochainement.",
            'attributes' => "is-info"
        ],[
            'step' => 2,
            'title' => "En cours de négociation",
            'description' => "Dossier pris en charge par un de nos négociateurs.",
            'attributes' => "is-warning"
        ],[
            'step' => 3,
            'title' => "Négociation réussie",
            'description' => "La négociation a été concluante, votre règlement est requis pour finaliser ce projet",
            'attributes' => "is-primary"
        ],[
            'step' => 4,
            'title' => "Négociation terminée",
            'description' => "Dossier terminé avec succès.",
            'attributes' => "is-success"
        ],[
            'step' => 5,
            'title' => "Négociation échouée",
            'description' => "La négociation a échoué, aucune action de votre part n'est requise.",
            'attributes' => "is-danger"
        ],
    ];
}
