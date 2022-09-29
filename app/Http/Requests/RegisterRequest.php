<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre de usuario es necesario.',
            'name.string' => 'El nombre de usuario debe ser un texto.',
            'email.required' => 'El correo es necesario',
            'email.email' => 'Ingresa un formato correcto de un correo',
            'email.unique' => 'El correo ingresado ya esta registrado, intente con otro',
            'password.required' => 'La contraseña es necesaria',
            'password.string' => 'La contraseña debe ser un texto',
        ];
    }
}
