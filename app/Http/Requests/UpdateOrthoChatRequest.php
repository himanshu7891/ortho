<?php

namespace App\Http\Requests;

use App\Models\OrthoChat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrthoChatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ortho_chat_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'phone_no' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'ortho_chat_access' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'action' => [
                'string',
                'nullable',
            ],
        ];
    }
}
