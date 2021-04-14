<?php

namespace App;

use App\Services\DBConnectionService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'role' , 'google2fa_secret' , 'allow_google2fa'
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

    public function projects()
    {
        return $this->hasOne(UserProject::class , 'user_id');
    }

    public function setGoogle2faSecretAttribute($value)
    {
        $this->attributes['google2fa_secret'] = encrypt($value);
    }
    public function getGoogle2faSecretAttribute($value)
    {
        return decrypt($value);
    }

    public function userBalance()
    {
        return $this->hasOne(UserBalance::class , 'user_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {


            $model->userBalance()->create([

                'user_id' => $model->user_id,
                'balance' => 0,

            ]);

        });

    }

}
