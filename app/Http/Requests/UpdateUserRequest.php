<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $userId = $this->route('user')->id;
        return [
            "first_name" => "required|string|max:255",
            "last_name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $userId,
            "phone_number" => "required|numeric|digits_between:10,11",
            "cafe_name" => "required|string|max:255",
            "password" => "required|string|min:8",
            "profile_photo" => "nullable|image|max:2048",
        ];
    }
}
