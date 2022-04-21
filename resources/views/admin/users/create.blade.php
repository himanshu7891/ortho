@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.user.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="locations">{{ trans('cruds.user.fields.location') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('locations') ? 'is-invalid' : '' }}" name="locations[]" id="locations" multiple required>
                    @foreach($locations as $id => $location)
                        <option value="{{ $id }}" {{ in_array($id, old('locations', [])) ? 'selected' : '' }}>{{ $location }}</option>
                    @endforeach
                </select>
                @if($errors->has('locations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('locations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check ">
                    <input type="hidden" name="notify_email" value="0">
                    <input class="form-check-input" type="checkbox" name="notify_email" id="notify_email" value="1" @if(is_array(old('notify_email')) && in_array(1, old('notify_email'))) checked @endif>
                    <label class="form-check-label" for="notify_email">{{ trans('cruds.user.fields.notify_email') }}</label>
                </div>
                <span class="help-block">{{ trans('cruds.user.fields.notify_email_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check ">
                    <input type="hidden" name="notify_sms" value="0">
                    <input class="form-check-input" type="checkbox" name="notify_sms" id="notify_sms" value="1" @if(is_array(old('notify_email')) && in_array(1, old('notify_email'))) checked @endif>
                    <label class="form-check-label" for="notify_sms">{{ trans('cruds.user.fields.notify_sms') }}</label>
                </div>
                <span class="help-block">{{ trans('cruds.user.fields.notify_sms_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check ">
                    <input type="hidden" name="notify_voice" value="0">
                    <input class="form-check-input" type="checkbox" name="notify_voice" id="notify_voice" value="1"  @if(is_array(old('notify_voice')) && in_array(1, old('notify_voice'))) checked @endif>
                    <label class="form-check-label" for="notify_voice">{{ trans('cruds.user.fields.notify_voice') }}</label>
                </div>
                <span class="help-block">{{ trans('cruds.user.fields.notify_voice_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check ">
                    <input type="hidden" name="new_patient" value="0">
                    <input class="form-check-input" type="checkbox" name="new_patient" id="new_patient" value="1"  @if(is_array(old('new_patient')) && in_array(1, old('new_patient'))) checked @endif>
                    <label class="form-check-label" for="new_patient">{{ trans('cruds.user.fields.new_patient') }}</label>
                </div>
                <span class="help-block">{{ trans('cruds.user.fields.new_patient_helper') }}</span>
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