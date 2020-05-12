<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'iban',
        'swift',
        'address',
        'name',
        'user_id'
    ];
}
