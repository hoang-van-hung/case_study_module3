<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'role_id'=>'required',
            'name'=>'required|min:6',
            'email'=>'required',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
          'name.required'=>'Name must be fill',
          'name.min'=>'Name must atlease 5 character!',
            'email.required'=> 'Email must be fill!',
            'email.unique'=> 'Email must be unique!',
            'password.required'=>'Password must be fill',
            'password.min'=>'Password atlease 6 character',
            'role_id.required'=>'Role must be check',

        ];

    }
}
