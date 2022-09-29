<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            'email' =>'required|email',
            'password' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'El correo es necesario',
            'email.email' => 'Ingresa un formato correcto de un correo',
            'password.required' => 'La contraseña es necesaria',
            'password.string' => 'La contraseña debe ser un texto',
        ];
    }
}
