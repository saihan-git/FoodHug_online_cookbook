<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChefLoginRequest;
use App\Http\Requests\ChefResetPasswordRequest;
use App\Http\Requests\ChefSentResetLinkRequest;
use App\Mail\ChefResetPasswordMail;
use App\Models\Chef;
use App\Models\ChefPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ChefAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('chef.login');
    }

    public function login(ChefLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $chef = Chef::where('email', $credentials['email'])->first();

        if ($chef && Hash::check($credentials['password'], $chef->password)) {
            Auth::guard('chef')->login($chef);
            return redirect()->route('chef.profile');
        }

        return back()->withErrors(['password' => 'Email and password do not match'])->withInput($request->only('email'));
    }

    public function profile()
    {
        return view('chef.profile');
    }

    public function logout()
    {
        Auth::guard('chef')->logout(); // Use the 'chef' guard
        Session::invalidate();
        Session::regenerateToken();

        return redirect()->route('chef.login');
    }

    public function showForgotPasswordForm()
    {
        return view('chef.forgot_password');
    }

    public function sendResetLinkEmail(ChefSentResetLinkRequest $request)
    {

        $chef = Chef::where('email', $request->email)->first();

        if ($chef) {
            $token = Str::random(60);
            ChefPasswordReset::create([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            $resetLink = route('chef.password.reset', ['token' => $token, 'email' => $request->email]);
            Mail::to($request->email)->send(new ChefResetPasswordMail($resetLink));

            return back()->with('status', 'We have e-mailed your password reset link!');
        }

        return back()->withErrors(['email' => 'Email does not exist']);
    }

    public function showResetPasswordForm($token, Request $request)
    {
        return view('chef.reset_password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(ChefResetPasswordRequest $request)
    {
        $passwordReset = ChefPasswordReset::where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token or email']);
        }

        $chef = Chef::where('email', $request->email)->first();

        if ($chef) {
            $chef->password = Hash::make($request->password);
            $chef->save();
            ChefPasswordReset::where('email', $request->email)->delete();
            return redirect()->route('chef.login')->with('status', 'Password has been reset successfully');
        }

        return back()->withErrors(['email' => 'Email does not exist']);
    }
}
