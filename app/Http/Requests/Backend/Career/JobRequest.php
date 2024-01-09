<?php

namespace App\Http\Requests\Backend\Career;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class JobRequest extends FormRequest
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
            'title'       => 'required|string|max:60',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Please enter a title',
            'start_date.required'   => 'Please select start date',
            'end_date.required'     => 'Please select end date',
        ];
    }
}
