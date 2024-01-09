<?php

namespace App\Http\Requests\Backend\Homepage;

use Illuminate\Foundation\Http\FormRequest;

class WelcomeRequest extends FormRequest
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
            'title'         => 'required|string|max:60',
            'description'   => 'required',
            'image_input'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required'           => 'Please enter title',
            'description.required'     => 'Please enter description',
        ];
    }
}
