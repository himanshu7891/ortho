@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.casesModal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cases-modals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.id') }}
                        </th>
                        <td>
                            {{ $casesModal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_first_name') }}
                        </th>
                        <td>
                            {{ $casesModal->patient_first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_last_name') }}
                        </th>
                        <td>
                            {{ $casesModal->patient_last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_dob') }}
                        </th>
                        <td>
                            {{ $casesModal->patient_dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_gender') }}
                        </th>
                        <td>
                            {{ App\Models\CasesModal::PATIENT_GENDER_RADIO[$casesModal->patient_gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.description') }}
                        </th>
                        <td>
                            {{ $casesModal->description }}
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>
                            {{ trans('cruds.casesModal.fields.status') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $casesModal->status ? 'checked' : '' }}>
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cases-modals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection