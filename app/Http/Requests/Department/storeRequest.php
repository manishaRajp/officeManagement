<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z]+$/u|unique:deparments'
        ];
    }

    public function messages()
    {
       return [
            'name.regex' => 'Please Use only Alphabetic Charcters....'
       ];
    }
}
