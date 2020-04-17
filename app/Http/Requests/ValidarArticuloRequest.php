<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarArticuloRequest extends FormRequest
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

            'titulo'        => 'required|min:1|max:30',
            'subtitulo'        => 'required|min:1|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'   => 'El título es obligatorio.',
            'titulo.min'        => 'El título debe contener más de una letra.',
            'titulo.max'        => 'El título debe contener máximo 10 letras.',

            'subtitulo.required'   => 'El subtítulo es obligatorio.',
            'subtitulo.min'        => 'El subtítulo debe contener más de una letra.',
            'subtitulo.max'        => 'El subtítulo debe contener máximo 10 letras.',


        ];
    }

    public function attributes()
    {
        return [];
    }
}
