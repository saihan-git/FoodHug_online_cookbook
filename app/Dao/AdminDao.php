<?php

namespace App\Dao;

use App\Contracts\Dao\AdminDaoInterface;
use App\Models\Admin;
use App\Models\AdminPasswordReset;
use Illuminate\Support\Facades\Hash;

class AdminDao implements AdminDaoInterface
{
    public function findAdminByEmail(string $email)
    {
        return Admin::where('email', $email)->first();
    }

    public function createPasswordResetToken(string $email, string $token)
    {
        return AdminPasswordReset::create([
            'email' => $email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);
    }

    public function resetAdminPassword(string $email, string $password)
    {
        $admin = Admin::where('email', $email)->first();
        $admin->password = Hash::make($password);
        $admin->save();
    }

    public function deletePasswordResetToken(string $email)
    {
        AdminPasswordReset::where('email', $email)->delete();
    }
}
