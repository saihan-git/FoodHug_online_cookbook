<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MemberPasswordReset extends Model
{
    protected $table = 'member_password_resets';

    protected $fillable = ['email', 'token'];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }
}