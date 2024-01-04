<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSubServiceRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                Rule::unique('sub_services', 'name')->ignore($this->route('subService')),
            ],
            'slug' => [
                'string',
                Rule::unique('sub_services', 'slug')->ignore($this->route('subService')),
            ],
            'service_id' => 'required|integer|exists:services,id',
            'price' => 'nullable',
            'description' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
