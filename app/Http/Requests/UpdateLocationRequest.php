<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('location_edit');
    }

    public function rules()
    {
        return [
            'email_address' => [
                'string',
                'required',
                'unique:locations,email_address,' . request()->route('location')->id,
            ],
            'location_name' => [
                'string',
                'required',
            ],
            'address_line_1' => [
                'string',
                'required',
            ],
            'address_line_2' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'fax_number' => [
                'string',
                'required',
            ],
            'country' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'zip_code' => [
                'string',
                'required',
            ],
            'latitude' => [
                'string',
                'required',
            ],
            'longitude' => [
                'string',
                'required',
            ],
            'accept_emergencies' => [
                'required',
            ],
            'coming_soon' => [
                'required',
            ],
            'active' => [
                'required',
            ],
            'directions' => [
                'string',
                'nullable',
            ],
        ];
    }
}
