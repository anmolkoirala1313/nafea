<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'title.*'         => 'required|string|max:60',
            'description.*'   => 'required|string|max:500',
            'list_title.*'    => 'required|string|max:60',
            'list_file.*'  => request()->isMethod('post') ? 'required|file|max:2048' : 'nullable|file|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.*.required'         => 'Please enter title',
            'description.*.max'        => 'Description cannot be more than 500 characters',
            'list_title.*.required'    => 'Please enter detail title',
        ];
    }
}
