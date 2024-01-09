<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title'         => 'required|string|max:30|unique:pages,title,'.$this->page,
            'image_input'   => 'nullable|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Please enter a title',
            'title.unique'              => 'Title is already in use',
            'title.max'                 => 'Title must be less than 30 characters',
            'image_input.required'      => 'Please select a image',
        ];
    }
}
