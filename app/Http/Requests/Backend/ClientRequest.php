<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'title'           => 'nullable|string|max:60',
            'link'            => 'nullable|url',
            'image_input'     => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Please enter title',
            'title.max'                 => 'Title must be less than 60 characters',
            'image_input.required'      => 'Please select a image',
            'link.url'                  => 'Please enter a valid url',
        ];
    }
}
