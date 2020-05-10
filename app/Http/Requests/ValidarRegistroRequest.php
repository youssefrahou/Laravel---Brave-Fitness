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
            'name'        => 'required|min:1|string|max:255',
            'apellido1'        => 'required|min:1|max:255',
            'apellido2'        => 'min:0|max:255',
            'objetivo'        => 'required',
            'sexo'        => 'required',
            'peso'        => 'required|integer|gt:30|lt:200',
            'altura'        => 'required|integer|gt:80|lt:300',
            'fechaNacimiento'        => 'required|after:1920-01-01|before:today',
            'email'        => 'required|string|min:1|email|max:255|unique:users',
            'password'        => 'required|string|min:8|max:100|confirmed',


        ];
    }

    public function messages()
    {
        return [
            
            'name.required'   => 'El nombre es obligatorio.',
            'apellido1.required'   => 'El apellido es obligatorio.',
            'altura.required'   => 'La altura es obligatoria.',
            'fechaNacimiento.required'   => 'La fecha de nacimiento es obligatoria.',
            'fechaNacimiento.after'   => 'La fecha de nacimiento es incorrecta.',
            'fechaNacimiento.before'   => 'La fecha de nacimiento no puede ser posterior al día de hoy.',
            'password.required'   => 'La contraseña es obligatoria.',
            'altura.gt'   => 'La altura debe ser mayor. Recuerda ponerla en centímetros.',
            'altura.lt'   => 'La altura debe ser menor. Recuerda ponerla en centímetros.',
            'altura.integer'   => 'La altura debe un número entero. Recuerda ponerla en centímetros.',
            'peso.integer'   => 'El peso debe un número entero. No uses decimales.',
            
            


            'required' => 'El :attribute es obligatorio.',
            'gt' => 'El :attribute debe ser mayor.',
            'ls' => 'El :attribute debe ser menor.',
            'min' => 'El :attribute tiene que tener mínimo :min caracteres.',
            'max' => 'El :attribute tiene que tener mínimo :max caracteres.',

        ];
    }


}
