<?php

namespace App\Http\Validators\Autenticacao;

use App\Http\Validators\CommomValidator;

class RecuperarSenhaValidator extends CommomValidator
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }
}