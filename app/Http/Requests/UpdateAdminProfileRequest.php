<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAdminProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request. You can add logic to restrict access.
    }

    public function rules()
    {
        // Get the current admin's ID
        $adminId = Auth::guard('admin')->id();

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $adminId,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
