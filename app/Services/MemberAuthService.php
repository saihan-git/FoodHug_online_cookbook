<?php

namespace App\Services;

use App\Contracts\Dao\MemberAuthDaoInterface;
use App\Contracts\Services\MemberAuthServiceInterface;
use Illuminate\Http\Request;

class MemberAuthService implements MemberAuthServiceInterface
{
    protected $memberAuthDao;

    public function __construct(MemberAuthDaoInterface $memberAuthDao)
    {
        $this->memberAuthDao = $memberAuthDao;
    }

    public function login(Request $request)
    {
        return $this->memberAuthDao->login($request);
    }

    public function sendResetLinkEmail(Request $request)
    {
        return $this->memberAuthDao->sendResetLinkEmail($request);
    }

    public function resetPassword(Request $request)
    {
        return $this->memberAuthDao->resetPassword($request);
    }
}
