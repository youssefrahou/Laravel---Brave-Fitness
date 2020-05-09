<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRegistroRequest extends FormRequest
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
            'name'        => 'required|min:1|max:100',
            'apellido1'        => 'required|min:1|max:100',
           // 'name', 'apellido1', 'apellido2', 'objetivo', 'sexo', 'peso', 'altura', 'fechaNacimiento', 'email', 'password',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'El nombre es obligatorio.',
            'apellido1.required'   => 'El apellido es obligatorio.',


        ];
    }


}
