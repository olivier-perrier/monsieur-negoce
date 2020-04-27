<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['type', 'content'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
