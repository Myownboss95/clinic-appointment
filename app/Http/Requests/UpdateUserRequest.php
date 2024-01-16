<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
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
            'email' => ['sometimes', 'string', 'max:255', Rule::unique('users', 'email')->ignore($this->user)],
            'dob' => 'required|string',
            'phone_number' => 'required|string',
            'city_id' => 'nullable|string',
            'state_id' => 'nullable|string',
            'country_id' => 'nullable|string',
            'gender' => 'nullable|string|max:255',
        ];
    }
}
