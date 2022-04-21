@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.appointments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="arrival_date">{{ trans('cruds.appointment.fields.arrival_date') }}</label>
                <input class="form-control {{ $errors->has('arrival_date') ? 'is-invalid' : '' }}" type="text" name="arrival_date" id="arrival_date" value="{{ old('arrival_date', '') }}">
                @if($errors->has('arrival_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('arrival_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.arrival_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location_name">{{ trans('cruds.appointment.fields.location_name') }}</label>
                <input class="form-control {{ $errors->has('location_name') ? 'is-invalid' : '' }}" type="text" name="location_name" id="location_name" value="{{ old('location_name', '') }}">
                @if($errors->has('location_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.location_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.appointment.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.appointment.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.appointment.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_address">{{ trans('cruds.appointment.fields.email_address') }}</label>
                <input class="form-control {{ $errors->has('email_address') ? 'is-invalid' : '' }}" type="text" name="email_address" id="email_address" value="{{ old('email_address', '') }}">
                @if($errors->has('email_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.email_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.appointment.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reason">{{ trans('cruds.appointment.fields.reason') }}</label>
                <input class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" type="text" name="reason" id="reason" value="{{ old('reason', '') }}">
                @if($errors->has('reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_created">{{ trans('cruds.appointment.fields.date_created') }}</label>
                <input class="form-control {{ $errors->has('date_created') ? 'is-invalid' : '' }}" type="text" name="date_created" id="date_created" value="{{ old('date_created', '') }}">
                @if($errors->has('date_created'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_created') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.appointment.fields.date_created_helper') }}</span>
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