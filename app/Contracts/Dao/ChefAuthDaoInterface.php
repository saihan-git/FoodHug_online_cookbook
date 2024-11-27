<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface ChefAuthDaoInterface
{
    public function findChefByEmail(string $email);
    public function createChefPasswordReset(string $email, string $token);
    public function getChefPasswordResetByEmailAndToken(string $email, string $token);
    public function deleteChefPasswordReset(string $email);
}
