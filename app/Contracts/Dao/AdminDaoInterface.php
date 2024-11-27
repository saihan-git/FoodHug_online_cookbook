<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface AdminDaoInterface
{
    public function findAdminByEmail(string $email);

    public function createPasswordResetToken(string $email, string $token);

    public function resetAdminPassword(string $email, string $password);

    public function deletePasswordResetToken(string $email);
}
