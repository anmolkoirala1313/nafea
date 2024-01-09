<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProprietorRequest extends FormRequest
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
            'title'                => 'required|string',
            'office_number'        => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'Please enter a title',
            'office_number.required'        => 'Please enter office number',
        ];
    }
}
