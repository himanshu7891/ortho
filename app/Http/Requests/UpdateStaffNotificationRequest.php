<?php

namespace App\Http\Requests;

use App\Models\StaffNotification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStaffNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staff_notification_edit');
    }

    public function rules()
    {
        return [
            'location_name' => [
                'string',
                'nullable',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'email_address' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'notify_sms' => [
                'string',
                'nullable',
            ],
            'notify_voice' => [
                'string',
                'nullable',
            ],
            'notify_email' => [
                'string',
                'nullable',
            ],
            'notify_new_patient' => [
                'string',
                'nullable',
            ],
        ];
    }
}
