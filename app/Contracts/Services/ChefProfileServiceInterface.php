<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface ChefProfileServiceInterface
{
    public function showProfile($chefId);
    public function updateProfile($chef, Request $request);
}
