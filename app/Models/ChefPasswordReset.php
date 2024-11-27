<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ChefPasswordReset extends Model
{
    protected $table = 'chef_password_resets';
    public $timestamps = false;
    protected $fillable = ['email', 'token', 'created_at'];
}
