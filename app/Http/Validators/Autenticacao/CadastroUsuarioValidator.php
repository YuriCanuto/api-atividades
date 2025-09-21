<?php

namespace App\Http\Validators\Autenticacao;

use Illuminate\Foundation\Http\FormRequest;

class CadastroUsuarioValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'       => 'required|string',
            'email'      => 'required|email|unique:users',
            'password'   => 'required',
            'c_password' => 'required|same:password',
        ];
    }
}
