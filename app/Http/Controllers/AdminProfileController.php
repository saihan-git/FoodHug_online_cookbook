<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AdminProfileServiceInterface;
use App\Http\Requests\UpdateAdminProfileRequest;

/**
 * AdminProfileController handles the display and update of the admin's profile.
 */
class AdminProfileController extends Controller
{
    protected $adminProfileService;

    public function __construct(AdminProfileServiceInterface $adminProfileService)
    {
        $this->adminProfileService = $adminProfileService;
    }

    /**
     * Show the admin profile.
     *
     * Retrieves the currently authenticated admin and displays the profile view.
     * If no admin is authenticated, redirects to the admin login page with an error message.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->adminProfileService->showProfile();
    }

    /**
     * Update the admin profile.
     *
     * Handles the request to update the admin's profile information including name, email, 
     * and profile image. Validates the request data using the UpdateAdminProfileRequest form request.
     * Saves the changes and redirects back to the profile page with a success message.
     *
     * @param  \App\Http\Requests\UpdateAdminProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminProfileRequest $request)
    {
        return $this->adminProfileService->updateProfile($request);
    }
}
