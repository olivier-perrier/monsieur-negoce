<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public function allCategories()
    {
        return Meta::where('key', 'CATEGORY')->get();
    }

    public static function allCashingStates()
    {
        return Meta::where('key', 'STATE_CASHING')->get();
    }
}
