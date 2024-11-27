<?php

namespace App\Contracts\Dao;

use App\Models\Admin;

interface AdminProfileDaoInterface
{
    public function getAdmin();

    public function updateAdmin(Admin $admin, array $data);
}
