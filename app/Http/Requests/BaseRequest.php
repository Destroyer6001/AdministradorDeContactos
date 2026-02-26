<?php

namespace App\Http\Requests;

use App\DTOs\ApiResponseDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $firstError = $validator->errors()->first();

        throw new HttpResponseException(
            response()->json(
                ApiResponseDTO::error($firstError)
            )
        );
    }
}
