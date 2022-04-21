<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
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
            'old_date_created' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
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
