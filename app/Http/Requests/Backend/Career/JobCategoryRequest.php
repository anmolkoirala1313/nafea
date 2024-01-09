<?php

namespace App\Http\Requests\Backend\Career;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class JobCategoryRequest extends FormRequest
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
            'title'     => 'required|string|max:60|unique:job_categories,title,'.$this->category,
        ];
    }

    public function messages()
    {
        return [
            'title.required'      => 'Please enter a title',
            'title.unique'        => 'Title already in use',
        ];
    }
}
