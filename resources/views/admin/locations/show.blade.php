@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.location.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.locations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.id') }}
                        </th>
                        <td>
                            {{ $location->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.email_address') }}
                        </th>
                        <td>
                            {{ $location->email_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.location_name') }}
                        </th>
                        <td>
                            {{ $location->location_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.address_line_1') }}
                        </th>
                        <td>
                            {{ $location->address_line_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.address_line_2') }}
                        </th>
                        <td>
                            {{ $location->address_line_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $location->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.fax_number') }}
                        </th>
                        <td>
                            {{ $location->fax_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.country') }}
                        </th>
                        <td>
                            {{ $location->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.state') }}
                        </th>
                        <td>
                            {{ $location->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.city') }}
                        </th>
                        <td>
                            {{ $location->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.zip_code') }}
                        </th>
                        <td>
                            {{ $location->zip_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.latitude') }}
                        </th>
                        <td>
                            {{ $location->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.longitude') }}
                        </th>
                        <td>
                            {{ $location->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.accept_emergencies') }}
                        </th>
                        <td>
                            {{ App\Models\Location::ACCEPT_EMERGENCIES_SELECT[$location->accept_emergencies] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.coming_soon') }}
                        </th>
                        <td>
                            {{ App\Models\Location::COMING_SOON_SELECT[$location->coming_soon] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.active') }}
                        </th>
                        <td>
                            {{ App\Models\Location::ACTIVE_SELECT[$location->active] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.location_imagepath') }}
                        </th>
                        <td>
                            @if($location->location_imagepath)
                                <a href="{{ $location->location_imagepath->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $location->location_imagepath->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.location.fields.directions') }}
                        </th>
                        <td>
                            {{ $location->directions }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.locations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#location_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="location_users">
            @includeIf('admin.locations.relationships.locationUsers', ['users' => $location->locationUsers])
        </div>
    </div>
</div>

@endsection