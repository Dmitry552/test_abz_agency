<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    public const DEFAULT_COUNT = 5;

    public function all($keys = null): array
    {
        $data = parent::all($keys);

        isset($data['count']) || $data['count'] = self::DEFAULT_COUNT;

        return $data;
    }

    public function rules(): array
    {
        return [
            'page' => [
                'integer',
                'min:1',
                'nullable'
            ],
            'count' => [
                'integer',
                'min:1',
                'nullable'
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'fails' => $validator->errors(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
