<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PageSectionElementRequest extends FormRequest
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

        if (request('section_name') == 'slider_list'){
            $rules = [
                'image_input.*' => 'required'
            ];
        }else{
            $rules = [];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'image_input.*.required'            => 'Please select an image',
        ];
    }
}
