<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    public function AllCategories()
    {
        return Meta::where('key', 'CATEGORY')->get();
    }
}
