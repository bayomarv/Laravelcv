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
        'name', 'email', 'password',
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

    public function details()
    {
        return $this->hasOne('App\UserDetail');
    }

    public function certificates()
    {
        return $this->hasMany('App\Certificate');
    }

    public function experiences()
    {
        return $this->hasMany('App\Experience');
    }

    public function education() 
    {
        return $this->hasMany('App\Education');
    }

    public function skills()
    {
        return $this->hasMany('App\Skill');
    }
       
}
