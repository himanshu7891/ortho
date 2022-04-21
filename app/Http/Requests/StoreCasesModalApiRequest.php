<?php

namespace App\Http\Requests;

use App\Models\CasesModal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCasesModalApiRequest extends FormRequest
{

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
            'patient_gender' => [
                'required',
            ],
            'status_id' =>  [
                'required',
            ],
            'description' => [
                'required',
            ],
            'originator' =>  [
                'required',
            ],
            'collaborator' =>  [
                'required',
            ],
            'invite_id_to_be_read' => [
                'required',
            ]
        ];
    }
}
