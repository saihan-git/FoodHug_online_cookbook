<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AdminServiceInterface;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\AdminSendResetLinkRequest;
use App\Models\Admin;
use App\Models\AdminPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminAuthController
 *
 * Controller for handling admin authentication, including login, logout,
 * password reset, and profile management.
 */
class AdminAuthController extends Controller
{
    /**
     * @var AdminServiceInterface
     */
    protected $adminService;

    /**
     * AdminAuthController constructor.
     *
     * @param AdminServiceInterface $adminService
     */
    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle login request.
     *
     * @param AdminLoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(AdminLoginRequest $request)
    {
        return $this->adminService->login($request);
    }

    /**
     * Show the profile page.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Handle logout request.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /**
     * Show the password reset request form.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('admin.forgot_password');
    }

    /**
     * Handle sending of the reset link email.
     *
     * @param AdminSendResetLinkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(AdminSendResetLinkRequest $request)
    {
        return $this->adminService->sendResetLinkEmail($request);
    }

    /**
     * Show the password reset form.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        return view('admin.reset_password')->with(
            ['token' => $request->token, 'email' => $request->email]
        );
    }

    /**
     * Handle password reset request.
     *
     * @param AdminResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(AdminResetPasswordRequest $request)
    {
        //return $this->adminService->resetPassword($request);
        $adminPasswordReset = AdminPasswordReset::where('email', $request->email)->first();

        if (!$adminPasswordReset || !Hash::check($request->token, $adminPasswordReset->token)) {
            return back()->withErrors(['token' => 'Invalid token!']);
        }

        $admin = Admin::where('email', $request->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->save();

        // Delete the token after resetting password
        $adminPasswordReset->delete();

        return redirect()->route('admin.login')->with('status', 'Password has been reset!');
    }



    //    public function resetPassword(AdminResetPasswordRequest $request)
    //    {
    //        $passwordReset = AdminPasswordReset::where('email', $request->email)
    //            ->where('token', $request->token)
    //            ->first();
    //
    //        if (!$passwordReset) {
    //            return back()->withErrors(['email' => 'Invalid token or email']);
    //        }
    //
    //        $admin = Admin::where('email', $request->email)->first();
    //
    //        if ($admin) {
    //            $admin->password = Hash::make($request->password);
    //            $admin->save();
    //            AdminPasswordReset::where('email', $request->email)->delete();
    //            return redirect()->route('admin.login')->with('status', 'Password has been reset successfully');
    //        }
    //
    //        return back()->withErrors(['email' => 'Email does not exist']);
    //    }
}
