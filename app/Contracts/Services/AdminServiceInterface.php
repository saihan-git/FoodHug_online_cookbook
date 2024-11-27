<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface AdminServiceInterface
{
    public function login(Request $request);

    public function sendResetLinkEmail(Request $request);

    public function resetPassword(Request $request);
}
