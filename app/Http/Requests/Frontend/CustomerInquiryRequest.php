<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CustomerInquiryRequest extends FormRequest
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
            'name'          => 'required|string|max:50',
            'phone'         => 'required|numeric|digits:10',
            'message'       => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Please enter your name',
            'phone.required'            => 'Please enter your phone number',
            'phone.numeric'             => 'This field must be numeric',
            'phone.digits'              => 'The phone number must be 10 digits',
            'message.required'          => 'Please enter a short message regarding your inquiry',
            'message.max'               => 'Message must be less than 200 characters',
        ];
    }
}
