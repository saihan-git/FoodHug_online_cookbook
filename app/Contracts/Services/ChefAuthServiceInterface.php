<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface ChefAuthServiceInterface
{
    public function login(array $credentials);
    public function sendResetLinkEmail(string $email);
    public function resetPassword(Request $request);
}
