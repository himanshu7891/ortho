<?php

namespace App\Http\Requests;

use App\Models\Location;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('location_create');
    }

    public function rules()
    {
        return [
            'email_address' => [
                'string',
                'required',
                'unique:locations',
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
