<?php

namespace App\Http\Requests;

use App\Models\GeneralSetting;
use Illuminate\Foundation\Http\FormRequest;

class CreateGeneralSettingRequest extends FormRequest
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
            'ref_bonus' => 'required|integer',
            'calendly' => 'nullable|string',
            'site_phone' => 'required|string',
            'site_email' => 'required|email',
            'site_facebook' => 'required|url',
            'site_instagram' => 'required|url',
            'site_linkedin' => 'required|url',
            'site_twitter' => 'required|url',
        ];
    }
}
