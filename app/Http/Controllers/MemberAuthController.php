<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberLoginRequest;
use App\Http\Requests\MemberResetPasswordRequest;
use App\Http\Requests\MemberSendResetLinkRequest;
use App\Contracts\Services\MemberAuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberAuthController extends Controller
{
    protected $memberAuthService;

    public function __construct(MemberAuthServiceInterface $memberAuthService)
    {
        $this->memberAuthService = $memberAuthService;
    }

    public function showLoginForm()
    {
        return view('member.login');
    }

    public function login(MemberLoginRequest $request)
    {
        return $this->memberAuthService->login($request);
    }

    public function profile()
    {
        return view('member.profile');
    }

    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('member.login');
    }

    public function showLinkRequestForm()
    {
        return view('member.forgot_password');
    }

    public function sendResetLinkEmail(MemberSendResetLinkRequest $request)
    {
        return $this->memberAuthService->sendResetLinkEmail($request);
    }

    public function showResetForm(Request $request)
    {
        return view('member.reset_password')->with(
            ['token' => $request->token, 'email' => $request->email]
        );
    }

    public function resetPassword(MemberResetPasswordRequest $request)
    {
        return $this->memberAuthService->resetPassword($request);
    }
}
