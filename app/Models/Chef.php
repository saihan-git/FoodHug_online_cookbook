<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Chef extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'specialty', 'image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

//
//public function recipes()
//{
//    return $this->hasMany(Recipe::class, 'created_by');
//}