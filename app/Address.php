<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'company_name',
        'person_name',
        'street',
        'postcode',
        'city',
        'email',
        'phone',
    ];
}
