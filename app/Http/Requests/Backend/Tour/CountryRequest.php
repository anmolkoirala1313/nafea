<?php

namespace App\Http\Requests\Backend\Tour;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'title'     => 'required|string|max:191|unique:countries,title,'.$this->country,
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
