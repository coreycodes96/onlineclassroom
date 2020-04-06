<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    //Fillable
    protected $fillable = [
        'admin', 'firstname', 'surname', 'email', 'dob', 'gender', 'password',
    ];

    //Hidden
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Casts
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //creating a relationship with the enter class model
    public function enterclass(){
        return $this->hasMany(EnterClass::class);
    }
}
