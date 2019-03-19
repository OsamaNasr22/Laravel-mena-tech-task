<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employee_first_name'=>'required|string|max:190',
            'employee_last_name'=>'required|string|max:190',
            'employee_email'=>'nullable|email|max:190',
            'employee_phone'=>'nullable|numeric|digits:11',
            'employee_company'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'employee_first_name.required'=>'First name is required',
            'employee_first_name.string'=>'First name must be a string',
            'employee_last_name.required'=>'Last name is required',
            'employee_last_name.string'=>'Last name must be a string',
            'employee_email.email'=>'Invalid Employee Email',
            'employee_company'=>'Employee Company is required',
        ];
    }
}
