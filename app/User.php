<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role',
        'firstname',
        'lastname',
        'nationality',
        'birthday',
        'address',
        'address_postcode',
        'address_city',
        'email' ,
        'phone',
        'password',
        'siren',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'validated' => false,
    ];

    public function path()
    {
        return route("users.show", $this);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    public function isNegotiator()
    {
        return $this->role === "negotiator";
    }

    public function isClient()
    {
        return $this->role === "client";
    }

    public function isAdministrator()
    {
        return $this->role === "administrator"; 
    }

    public function amount_total_due()
    {
        $value = 0;

        $userId = $this->id;

        $projects = Project::where('negotiator_id', $userId)->get();

        foreach($projects as $project){
            $value += $project->amount_due();
        }

        return $value;
    }

}
