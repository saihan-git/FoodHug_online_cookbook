<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface ChefProfileDaoInterface
{
    public function getProfile($chefId);
    public function updateProfile($chef, Request $request);
}
