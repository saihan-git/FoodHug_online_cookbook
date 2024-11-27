<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminResetPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
