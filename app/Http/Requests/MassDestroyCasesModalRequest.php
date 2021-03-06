<?php

namespace App\Http\Requests;

use App\Models\CasesModal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCasesModalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cases_modal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:casemaster,id',
        ];
    }
}
