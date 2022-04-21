<?php

namespace App\Http\Requests;

use App\Models\CasesModal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCasesModalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cases_modal_create');
    }

    public function rules()
    {
        return [
            'patient_first_name' => [
                'string',
                'required',
            ],
            'patient_last_name' => [
                'string',
                'required',
            ],
            'patient_dob' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
