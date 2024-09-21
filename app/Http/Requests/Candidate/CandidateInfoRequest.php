<?php

namespace App\Http\Requests\Candidate;

use App\Models\Backend\Candidate;
use Illuminate\Foundation\Http\FormRequest;

class CandidateInfoRequest extends FormRequest
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

        $rules = [
            'first_name'               => 'required',
            'last_name'               => 'required',
            'passport_number'         => 'required|max:80',
            'passport_issue_date'     => 'required',
            'issue_place'             => 'required',
            'applied_country'         => 'required',
            'applied_for'             => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'first_name.required'            => 'Please enter a first name',
            'last_name.required'            => 'Please enter a last name',
            'passport_number.required'      => 'Please enter a passport number',
            'passport_issue_date.required'  => 'Please select a passport issue date',
            'issue_place.required'          => 'Please enter a issue place',
            'applied_country.required'      => 'Please select applied country',
            'applied_for.required'          => 'Please enter applied for',
            'candidate_input.required'      => 'Please select a image',
            'passport_input.required'       => 'Please upload passport image',
            'case_file_input.required'       => 'Please upload case file or image',
        ];
    }
}
