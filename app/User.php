<?php

namespace App;

use App\Mail\User\ResetPassword;
use App\Notifications\User\EmailVerification;
use App\Notifications\User\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements MustVerifyEmail
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
        'email',
        'phone',
        'password',
        'siren',
        'sponsor'

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

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerification($this));
    }
    

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($this, $token));
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function cashings()
    {
        return $this->hasMany(Cashing::class);
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

    public function fullname()
    {
        return (string) ($this->firstname . ' ' . $this->lastname);
    }

    public function amount_total_due()
    {
        $value = 0;

        $cashings = Cashing::where([
            'user_id' => $this->id,
            'state_id' => Cashing::state_id(Cashing::$STATE_EN_COURS)
        ])->get();

        foreach ($cashings as $cashing) {
            $value += $cashing->net_amount();
        }

        return $value;
    }
    public function amount_total_reversed()
    {
        $value = 0;

        $cashings = Cashing::where([
            'user_id' => $this->id,
            'state_id' => Cashing::state_id(Cashing::$STATE_REVERSE)
        ])->get();

        foreach ($cashings as $cashing) {
            $value += $cashing->net_amount();
        }

        return $value;
    }

    public static function get_administrators()
    {
        return User::where("role", "administrator")->get();
    }
}
