<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

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
