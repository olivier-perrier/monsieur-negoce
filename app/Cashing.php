<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashing extends Model
{
    protected $fillable = [
        'state_id',
        'amount',
        'taxe',
    ];


    public function allStates()
    {
        return Meta::allCashingStates();
    }

    public function state()
    {
        return $this->belongsTo(Meta::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return identifiant pour un nom d'état
     */
    public static function state_id($stateName)
    {
        $id = Meta::where([
            "key" => "STATE_CASHING",
            "value" => $stateName
        ])->first()->id;

        return $id;
    }

    public static string $STATE_EN_COURS = "En cours de traitement";
    public static string $STATE_REVERSE = "Montant reversé";
}
