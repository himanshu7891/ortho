<?php

namespace App\Http\Requests;

use App\Models\DocLibrary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocLibraryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doc_library_edit');
    }

    public function rules()
    {
        return [
            'doc_name' => [
                'string',
                'required',
            ],
            'url_path' => [
                'required',
            ],
        ];
    }
}
