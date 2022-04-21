<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'phone_number' => [
                'string',
                // 'min:2000',
                'nullable',
            ],
            'first_name' => [
                'string',
                // 'min:1000',
                'nullable',
            ],
            'last_name' => [
                'string',
                // 'min:1000',
                'nullable',
            ],
            'locations.*' => [
                'integer',
            ],
            'locations' => [
                'required',
                'array',
            ],
        ];
    }
}
