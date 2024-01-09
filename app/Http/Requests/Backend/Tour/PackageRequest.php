<?php

namespace App\Http\Requests\Backend\Tour;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class PackageRequest extends FormRequest
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
            'title'                     => 'required|string|unique:packages,title,'.$this->package,
            'country_id'                => 'required',
            'package_category_id'       => 'required',
            'image_input'               => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'Please enter a title',
            'title.unique'                  => 'Title already in use',
            'country_id.required'           => 'Please select a country',
            'package_category_id.required'  => 'Please select a category',
            'image_input.required'          => 'Please choose a image',
        ];
    }
}
