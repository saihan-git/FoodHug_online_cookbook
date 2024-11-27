<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email|exists:members,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
