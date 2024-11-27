<?php

namespace App\Dao;

use App\Contracts\Dao\ChefAuthDaoInterface;
use App\Models\Chef;
use App\Models\ChefPasswordReset;

class ChefAuthDao implements ChefAuthDaoInterface
{
    public function findChefByEmail(string $email)
    {
        return Chef::where('email', $email)->first();
    }

    public function createChefPasswordReset(string $email, string $token)
    {
        return ChefPasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);
    }

    public function getChefPasswordResetByEmailAndToken(string $email, string $token)
    {
        return ChefPasswordReset::where('email', $email)
            ->where('token', $token)
            ->first();
    }

    public function deleteChefPasswordReset(string $email)
    {
        return ChefPasswordReset::where('email', $email)->delete();
    }
}
