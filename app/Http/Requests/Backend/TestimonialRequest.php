<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'title'         => 'required|string|max:50',
            'position'      => 'nullable|string|max:40',
            'description'   => 'required|string',
            'image_input'   => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Please enter a title',
            'title.max'                 => 'Title must be less than 50 characters',
            'position.max'              => 'Please must be less than 40 characters',
            'description.required'      => 'Please enter a description',
            'image_input.required'      => 'Please select a image',
        ];
    }
}
