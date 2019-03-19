<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company_name'=>'required|string|max:190',
            'company_logo'=>'nullable|image|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100',
            'company_email'=>'nullable|email|max:190',
            'company_website'=>'nullable|url|max:250'
        ];
    }
    public function messages()
    {
        return [
            'company_name.required'=>'Company name is required',
            'company_logo.mimes'=>'Company logo must be jpg,jpeg,png',
            'company_logo.dimensions'=>'Company logo minimum resolution must be 100x100',
            'company_logo.image'=>'Company logo must be an image',
            'company_email.email'=>'Invalid company email',
            'company_website.url'=>'The company website is not valid url',
        ];
    }
}
