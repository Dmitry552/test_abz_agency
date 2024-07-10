<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:60'
            ],
            'email' => [
                'required',
                'email:rfs',
                'unique:users,email',
            ],
            'phone' => [
                'required',
                'string',
                'starts_with:+380',
                'max:13',
                'unique:users,phone'
            ],
            'position_id' => [
                'required',
                'integer',
                'exists:positions,id'
            ],
            'photo' => [
                'required',
                'image',
                'mimes:jpeg,jpg',
                'max:5120',
                'dimensions:max_width=70,max_height=70'
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $data = $this->dataSelection($validator);

        $response = response()->json(
            array_merge(['success' => false], $data['content']),
            $data['code']
        );

        throw new HttpResponseException($response);
    }

    private function dataSelection(Validator $validator): array
    {
        $failed = $validator->failed();
        $data = [];

        if (!empty($failed['email']['Unique']) || !empty($failed['phone']['Unique'])) {
            $data['content'] = [
                'message' => 'User with this phone or email already exist',
            ];
            $data['code'] = 409;
        } else {
            $data['content'] = [
                'message' => 'Validation failed',
                'fails' => $validator->errors(),
            ];
            $data['code'] = 422;
        }

        return $data;
    }
}
