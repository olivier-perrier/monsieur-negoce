<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['type', 'content'];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
