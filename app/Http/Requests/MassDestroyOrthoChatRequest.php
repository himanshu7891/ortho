<?php

namespace App\Http\Requests;

use App\Models\OrthoChat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOrthoChatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ortho_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:doctors,id',
        ];
    }
}
