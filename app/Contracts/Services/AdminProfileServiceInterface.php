<?php

namespace App\Contracts\Services;

use App\Http\Requests\UpdateAdminProfileRequest;

interface AdminProfileServiceInterface
{
    public function showProfile();

    public function updateProfile(UpdateAdminProfileRequest $request);
}
