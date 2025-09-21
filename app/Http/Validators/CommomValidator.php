<?php

namespace App\Http\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CommomValidator
{
    public function __construct(
        public array $rules = []
    )
    { }

    public function validate(array $request)
    {
        $validator = Validator::make($request, $this->rules);

        dd($validator);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->getMessageBag()->messages());
        }

        return $validator;
    }
}