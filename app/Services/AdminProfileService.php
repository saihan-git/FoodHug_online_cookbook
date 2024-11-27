<?php

namespace App\Services;

use App\Contracts\Services\AdminProfileServiceInterface;
use App\Contracts\Dao\AdminProfileDaoInterface;
use App\Http\Requests\UpdateAdminProfileRequest;

class AdminProfileService implements AdminProfileServiceInterface
{
    protected $adminProfileDao;

    public function __construct(AdminProfileDaoInterface $adminProfileDao)
    {
        $this->adminProfileDao = $adminProfileDao;
    }

    public function showProfile()
    {
        $admin = $this->adminProfileDao->getAdmin();
        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['auth' => 'Please log in first.']);
        }
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(UpdateAdminProfileRequest $request)
    {
        $admin = $this->adminProfileDao->getAdmin();

        $data = $request->only('name', 'email');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $data['image']);
        }

        $this->adminProfileDao->updateAdmin($admin, $data);

        return redirect()->route('admin.profile')->with('status', 'Profile updated successfully!');
    }
}
