<?php

namespace App\Http\Requests;

use App\Models\OrthoChat;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrthoChatRequest extends FormRequest
{

    public function rules()
    {
        return [
            'first_name' => [
                'required',
                'string',
            ],
            'last_name' => [
                'required',
                'string',
            ],
            'phone_number' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
            ],
            'os' => [
                'required',
                'string',
            ],
            'device_id' => [
                'required',
                'string',
            ],
            'is_doctor' => [
                'required',
                'string'
            ],
        ];
    }
}
