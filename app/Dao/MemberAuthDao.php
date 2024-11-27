<?php

namespace App\Dao;

use App\Contracts\Dao\MemberAuthDaoInterface;
use App\Mail\MemberResetPasswordMail;
use App\Models\Member;
use App\Models\MemberPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MemberAuthDao implements MemberAuthDaoInterface
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('member')->attempt($credentials)) {
            return redirect()->intended(route('member.profile'));
        }

        return back()->withErrors([
            'email' => 'Email and Password do not match',
        ]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $member = Member::where('email', $request->email)->first();

        // Generate a token
        $token = Str::random(60);

        // Store token in a password resets table
        MemberPasswordReset::create([
            'email' => $member->email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);

        // Send email with reset link
        $resetLink = url("/member/reset-password?token=$token&email={$member->email}");
        Mail::to($member->email)->send(new MemberResetPasswordMail($resetLink));

        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function resetPassword(Request $request)
    {
        $memberPasswordReset = MemberPasswordReset::where('email', $request->email)->first();

        if (!$memberPasswordReset || !Hash::check($request->token, $memberPasswordReset->token)) {
            return back()->withErrors(['token' => 'Invalid token!']);
        }

        $member = Member::where('email', $request->email)->first();
        $member->password = Hash::make($request->password);
        $member->save();

        // Delete the token after resetting password
        $memberPasswordReset->delete();

        return redirect()->route('member.login')->with('status', 'Password has been reset!');
    }
}
