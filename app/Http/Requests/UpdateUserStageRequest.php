<?php

namespace App\Http\Requests;

use App\Models\UserStage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserStageRequest extends FormRequest
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
        $rules = UserStage::$rules;

        return $rules;
    }
}
