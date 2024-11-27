<?php

namespace App\Services;

use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Services\AdminServiceInterface;
use App\Mail\AdminResetPasswordMail;
use App\Models\AdminPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminService implements AdminServiceInterface
{
    protected $adminDao;

    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended(route('admin.profile'));
        }

        return back()->withErrors([
            'password' => 'Email and password do not match',
        ])->withInput();
    }

    public function sendResetLinkEmail(Request $request)
    {
        $admin = $this->adminDao->findAdminByEmail($request->email);

        // Generate a token
        $token = Str::random(60);

        // Store token in a password resets table
        $this->adminDao->createPasswordResetToken($admin->email, $token);

        // Send email with reset link
        $resetLink = url("/admin/reset-password?token=$token&email={$admin->email}");
        Mail::to($admin->email)->send(new AdminResetPasswordMail($resetLink));

        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function resetPassword(Request $request)
    {
        $adminPasswordReset = AdminPasswordReset::where('email', $request->email)->first();

        if (!$adminPasswordReset || !Hash::check($request->token, $adminPasswordReset->token)) {
            return back()->withErrors(['token' => 'Invalid token!']);
        }

        $this->adminDao->resetAdminPassword($request->email, $request->password);

        // Delete the token after resetting password
        $this->adminDao->deletePasswordResetToken($request->email);

        return redirect()->route('admin.login')->with('status', 'Password has been reset!');
    }
}
