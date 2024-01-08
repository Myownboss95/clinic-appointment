<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function __construct(private User $user)
    {

    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'dob' => 'nullable|string',
            'phone_number' => 'required|string',
            'city' => 'nullable|integer',
            'state' => 'nullable|integer',
            'country' => 'nullable|integer',
            'role_id' => 'nullable|integer',
            'deleted_at' => 'nullable',
            'updated_at' => 'nullable',
            'created_at' => 'nullable',
            'password' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'balance' => 'nullable|integer',
            'life_time_balance' => 'nullable|integer',
            'referral_code' => 'nullable|string|max:255',
            'referred_by_user_id' => 'nullable|integer',
            'email_verified_at' => 'nullable',
            'image' => 'nullable|sometimes|mimeType:jpeg,jpg,png',

        ];

    }
}
