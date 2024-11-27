<?php

namespace App\Dao;

use App\Contracts\Dao\AdminProfileDaoInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminProfileDao implements AdminProfileDaoInterface
{
    public function getAdmin()
    {
        return Auth::guard('admin')->user();
    }

    public function updateAdmin(Admin $admin, array $data)
    {
        $admin->update($data);
    }
}
