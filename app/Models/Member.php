<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'image',];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'member_id');
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'member_id');
    }
}
