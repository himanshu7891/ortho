@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.staffNotification.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.staff-notifications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="location_name">{{ trans('cruds.staffNotification.fields.location_name') }}</label>
                <input class="form-control {{ $errors->has('location_name') ? 'is-invalid' : '' }}" type="text" name="location_name" id="location_name" value="{{ old('location_name', '') }}">
                @if($errors->has('location_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.location_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.staffNotification.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.staffNotification.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_address">{{ trans('cruds.staffNotification.fields.email_address') }}</label>
                <input class="form-control {{ $errors->has('email_address') ? 'is-invalid' : '' }}" type="text" name="email_address" id="email_address" value="{{ old('email_address', '') }}">
                @if($errors->has('email_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.email_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.staffNotification.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_sms">{{ trans('cruds.staffNotification.fields.notify_sms') }}</label>
                <input class="form-control {{ $errors->has('notify_sms') ? 'is-invalid' : '' }}" type="text" name="notify_sms" id="notify_sms" value="{{ old('notify_sms', '') }}">
                @if($errors->has('notify_sms'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_sms') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.notify_sms_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_voice">{{ trans('cruds.staffNotification.fields.notify_voice') }}</label>
                <input class="form-control {{ $errors->has('notify_voice') ? 'is-invalid' : '' }}" type="text" name="notify_voice" id="notify_voice" value="{{ old('notify_voice', '') }}">
                @if($errors->has('notify_voice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_voice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.notify_voice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_email">{{ trans('cruds.staffNotification.fields.notify_email') }}</label>
                <input class="form-control {{ $errors->has('notify_email') ? 'is-invalid' : '' }}" type="text" name="notify_email" id="notify_email" value="{{ old('notify_email', '') }}">
                @if($errors->has('notify_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.notify_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notify_new_patient">{{ trans('cruds.staffNotification.fields.notify_new_patient') }}</label>
                <input class="form-control {{ $errors->has('notify_new_patient') ? 'is-invalid' : '' }}" type="text" name="notify_new_patient" id="notify_new_patient" value="{{ old('notify_new_patient', '') }}">
                @if($errors->has('notify_new_patient'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notify_new_patient') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staffNotification.fields.notify_new_patient_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection