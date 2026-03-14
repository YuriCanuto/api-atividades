<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class CommomValidator
{
    abstract public function rules(): array;

    public function validate(array $request)
    {
        $validator = Validator::make($request, $this->rules());

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->getMessageBag()->messages());
        }

        return $validator;
    }
}