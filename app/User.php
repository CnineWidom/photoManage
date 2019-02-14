<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
<<<<<<< HEAD
    protected $table = 'p_users';
=======
    // protected $table ='p_users';
>>>>>>> 235dc13d399101ba8db915cdad3e0e35c4b33b9c
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
<<<<<<< HEAD
        'user_name', 'email', 'password',
=======
        'user_name', 'email', 'password'
>>>>>>> 235dc13d399101ba8db915cdad3e0e35c4b33b9c
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden =[
        'password', 'remember_token',
    ];
}
