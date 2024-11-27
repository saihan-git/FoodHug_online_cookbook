<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'ratings';
    protected $fillable = [
        'recipe_id','rating','created_by','updated_by','deleted_by'
    ];
}
