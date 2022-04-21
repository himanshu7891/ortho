@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.casesModal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cases-modals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="patient_first_name">{{ trans('cruds.casesModal.fields.patient_first_name') }}</label>
                <input class="form-control {{ $errors->has('patient_first_name') ? 'is-invalid' : '' }}" type="text" name="patient_first_name" id="patient_first_name" value="{{ old('patient_first_name', '') }}" required>
                @if($errors->has('patient_first_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_first_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casesModal.fields.patient_first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="patient_last_name">{{ trans('cruds.casesModal.fields.patient_last_name') }}</label>
                <input class="form-control {{ $errors->has('patient_last_name') ? 'is-invalid' : '' }}" type="text" name="patient_last_name" id="patient_last_name" value="{{ old('patient_last_name', '') }}" required>
                @if($errors->has('patient_last_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_last_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casesModal.fields.patient_last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="patient_dob">{{ trans('cruds.casesModal.fields.patient_dob') }}</label>
                <input class="form-control date {{ $errors->has('patient_dob') ? 'is-invalid' : '' }}" type="text" name="patient_dob" id="patient_dob" value="{{ old('patient_dob') }}" required>
                @if($errors->has('patient_dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casesModal.fields.patient_dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.casesModal.fields.patient_gender') }}</label>
                @foreach(App\Models\CasesModal::PATIENT_GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('patient_gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="patient_gender_{{ $key }}" name="patient_gender" value="{{ $key }}" {{ old('patient_gender', 'NULL') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="patient_gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('patient_gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('patient_gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casesModal.fields.patient_gender_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="originator">{{ trans('cruds.casesModal.fields.originator') }}</label>
                <div style="padding-bottom: 4px">
                    <!-- <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span> -->
                </div>
                <select class="form-control select2 {{ $errors->has('originator') ? 'is-invalid' : '' }}" name="originator" id="originator" required>
                    <option></option>
                    @foreach($doctors as $id => $doc)
                        <option value="{{ $doc->id }}" {{ in_array($doc->id, old('originator', [])) ? 'selected' : '' }}>{{ $doc->first_name .' '.$doc->last_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('originator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('originator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="collaborator">{{ trans('cruds.casesModal.fields.collaborator') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('collaborator') ? 'is-invalid' : '' }}" name="collaborator[]" id="collaborator" multiple required>
                    <option></option>
                    @foreach($doctors as $id => $doc)
                        <option value="{{ $doc->id }}" {{ in_array($doc->id, old('collaborator', [])) ? 'selected' : '' }}>{{ $doc->first_name .' '.$doc->last_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('collaborator'))
                    <div class="invalid-feedback">
                        {{ $errors->first('collaborator') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>


            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.casesModal.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casesModal.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('status_id') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="status_id" value="0">
                    <input class="form-check-input" type="checkbox" name="status_id" id="status_id" value="1" {{ old('status_id', 0) == 1 || old('status_id') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_id">{{ trans('cruds.casesModal.fields.status') }}</label>
                </div>
                @if($errors->has('status_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casesModal.fields.status_helper') }}</span>
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