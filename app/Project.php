<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'company_name'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
