@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.staffNotification.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staff-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.id') }}
                        </th>
                        <td>
                            {{ $staffNotification->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.location_name') }}
                        </th>
                        <td>
                            {{ $staffNotification->location_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.first_name') }}
                        </th>
                        <td>
                            {{ $staffNotification->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.last_name') }}
                        </th>
                        <td>
                            {{ $staffNotification->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.email_address') }}
                        </th>
                        <td>
                            {{ $staffNotification->email_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $staffNotification->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_sms') }}
                        </th>
                        <td>
                            {{ $staffNotification->notify_sms }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_voice') }}
                        </th>
                        <td>
                            {{ $staffNotification->notify_voice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_email') }}
                        </th>
                        <td>
                            {{ $staffNotification->notify_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_new_patient') }}
                        </th>
                        <td>
                            {{ $staffNotification->notify_new_patient }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.staff-notifications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection