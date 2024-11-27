<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

interface MemberAuthDaoInterface
{
    public function login(Request $request);
    public function sendResetLinkEmail(Request $request);
    public function resetPassword(Request $request);
}
