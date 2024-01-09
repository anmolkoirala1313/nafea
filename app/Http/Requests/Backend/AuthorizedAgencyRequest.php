<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizedAgencyRequest extends FormRequest
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
            'permission_number'    => 'required|string',
            'title'                => 'required|string',
            'address'              => 'required|string',
            'contact_number'       => 'required|string',
            'image_input'          => 'nullable|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'permission_number.required'    => 'Please enter a permission number',
            'title.required'                => 'Please enter a title',
            'address.required'              => 'Please write a address',
            'contact_number.required'       => 'Please enter contact number',
        ];
    }
}
