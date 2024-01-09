<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PageHeadingRequest extends FormRequest
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
            'type'         => 'required|string|max:30|unique:page_headings,type,'.$this->page_heading,
            'title'        => 'required|string|max:60',
        ];
    }

    public function messages()
    {
        return [
            'type.required'           => 'Please select type',
            'type.unique'            => 'Details for this page type already exists.',
            'title.max'               => 'Title must be less than 60 characters',
            'title.required'          => 'Please enter title',
        ];
    }
}
