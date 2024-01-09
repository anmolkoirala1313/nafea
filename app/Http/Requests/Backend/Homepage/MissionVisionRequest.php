<?php

namespace App\Http\Requests\Backend\Homepage;

use Illuminate\Foundation\Http\FormRequest;

class MissionVisionRequest extends FormRequest
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
            'mission'       => 'required|string|max:250',
            'vision'        => 'required|string|max:250',
            'value'         => 'required|string|max:250',
        ];
    }

    public function messages()
    {
        return [
            'mission.required'         => 'Please enter mission',
            'vision.required'          => 'Please enter vision',
            'value.required'           => 'Please enter value',
        ];
    }
}
