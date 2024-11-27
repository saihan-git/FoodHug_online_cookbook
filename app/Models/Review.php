<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'recipe_id','content','created_by','updated_by','deleted_by'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function starRating(): BelongsTo
    {
        return $this->belongsTo(Rating::class, 'created_by');
    }
}
