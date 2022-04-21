<?php

namespace App\Http\Requests;

use App\Models\DocLibrary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocLibraryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('doc_library_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:document_detail,id',
        ];
    }
}
