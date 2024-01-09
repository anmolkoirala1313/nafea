<?php

namespace App\Http\Requests\Backend\Homepage;

use Illuminate\Foundation\Http\FormRequest;

class GeneralGrievanceRequest extends FormRequest
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
            'grievance_title'       => 'required|string|max:60',
            'grievance_description' => 'required|string|max:900',
        ];
    }

    public function messages()
    {
        return [
            'grievance_title.required'         => 'Please enter title',
            'grievance_description.required'   => 'Please enter description',
        ];
    }
}
