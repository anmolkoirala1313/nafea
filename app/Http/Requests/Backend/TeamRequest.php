<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'title'             => 'required|string|max:60',
            'designation'       => 'required|string|max:60',
            'fb_link'           => 'nullable|url',
            'twitter_link'      => 'nullable|url',
            'instagram_link'    => 'nullable|url',
            'linkedin_link'     => 'nullable|url',
            'image_input'       => request()->method() == 'POST' ? 'required':'nullable'.'|image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Please enter title',
            'designation.required'      => 'Please enter description',
            'designation.max'           => 'Description must be less than 60 characters',
            'title.max'                 => 'Title must be less than 60 characters',
            'image_input.required'      => 'Please select a image',
            'fb_link.url'               => 'Please enter a valid url',
            'twitter_link.url'          => 'Please enter a valid url',
            'instagram_link.url'        => 'Please enter a valid url',
            'linkedin_link.url'         => 'Please enter a valid url',
        ];
    }
}
