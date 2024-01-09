<?php

namespace App\Http\Requests\Backend\Homepage;

use Illuminate\Foundation\Http\FormRequest;

class HomeValueRequest extends FormRequest
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
            'core_title'        => 'required|string|max:60',
            'detail_title.*'    => 'required|string|max:60',
        ];
    }

    public function messages()
    {
        return [
            'core_title.required'           => 'Please enter title',
            'detail_title.*.required'       => 'Please enter detail title',
        ];
    }
}
