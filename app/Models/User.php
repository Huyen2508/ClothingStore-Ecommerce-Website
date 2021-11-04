<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens,Notifiable;

    protected $table = 'users';
    
    protected $fillable = [
        'name', 'email', 'password', 'role', 'address', 'phone', 'dob'
    ];

    protected $hidden =[ 
        'password', 'remember_token'
    ];

   
}
