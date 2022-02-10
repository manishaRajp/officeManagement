<?php

namespace App\Http\Requests\Department;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class updateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $id = $request['id'];
       
        return [
            'name' => 'required|regex:/^[a-zA-Z]+$/u|unique:deparments,name,'.$id.',id',
        ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'Please Use only Alphabetic Charcters....'
        ];
    }
}
