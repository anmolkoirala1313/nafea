<?php

namespace App\Http\Requests\Backend\Homepage;

use Illuminate\Foundation\Http\FormRequest;

class CallActionRequest extends FormRequest
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
            'action_title'         => 'required|string|max:60',
        ];
    }

    public function messages()
    {
        return [
            'action_title.required'           => 'Please enter title',
        ];
    }
}
