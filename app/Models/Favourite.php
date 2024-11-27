<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $fillable = ['member_id', 'recipe_id'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
