<?php

namespace App\Http\Requests\Backend\News;

use Illuminate\Foundation\Http\FormRequest;

class PressReleaseRequest extends FormRequest
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
            'title'                 => 'required|string|max:191',
            'image_input'           => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'Please enter a title',
            'title.unique'                  => 'Title already in use',
            'image_input.required'          => 'Please select a image',
        ];
    }
}
