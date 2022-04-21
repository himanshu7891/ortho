@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.location.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.locations.update", [$location->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="email_address">{{ trans('cruds.location.fields.email_address') }}</label>
                <input class="form-control {{ $errors->has('email_address') ? 'is-invalid' : '' }}" type="email" name="email_address" id="email_address" value="{{ old('email_address', $location->email_address) }}" required>
                @if($errors->has('email_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.email_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location_name">{{ trans('cruds.location.fields.location_name') }}</label>
                <input class="form-control {{ $errors->has('location_name') ? 'is-invalid' : '' }}" type="text" name="location_name" id="location_name" value="{{ old('location_name', $location->location_name) }}" required>
                @if($errors->has('location_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.location_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_line_1">{{ trans('cruds.location.fields.address_line_1') }}</label>
                <input class="form-control {{ $errors->has('address_line_1') ? 'is-invalid' : '' }}" type="text" name="address_line_1" id="address_line_1" value="{{ old('address_line_1', $location->address_line_1) }}" required>
                @if($errors->has('address_line_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_line_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.address_line_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_line_2">{{ trans('cruds.location.fields.address_line_2') }}</label>
                <input class="form-control {{ $errors->has('address_line_2') ? 'is-invalid' : '' }}" type="text" name="address_line_2" id="address_line_2" value="{{ old('address_line_2', $location->address_line_2) }}">
                @if($errors->has('address_line_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_line_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.address_line_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.location.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $location->phone_number) }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fax_number">{{ trans('cruds.location.fields.fax_number') }}</label>
                <input class="form-control {{ $errors->has('fax_number') ? 'is-invalid' : '' }}" type="text" name="fax_number" id="fax_number" value="{{ old('fax_number', $location->fax_number) }}" required>
                @if($errors->has('fax_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fax_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.fax_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country">{{ trans('cruds.location.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $location->country) }}" required>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="state">{{ trans('cruds.location.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', $location->state) }}" required>
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.location.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $location->city) }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zip_code">{{ trans('cruds.location.fields.zip_code') }}</label>
                <input class="form-control {{ $errors->has('zip_code') ? 'is-invalid' : '' }}" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $location->zip_code) }}" required>
                @if($errors->has('zip_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.zip_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="latitude">{{ trans('cruds.location.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', $location->latitude) }}" required>
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="longitude">{{ trans('cruds.location.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', $location->longitude) }}" required>
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.location.fields.accept_emergencies') }}</label>
                <select class="form-control {{ $errors->has('accept_emergencies') ? 'is-invalid' : '' }}" name="accept_emergencies" id="accept_emergencies" required>
                    <option value disabled {{ old('accept_emergencies', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Location::ACCEPT_EMERGENCIES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('accept_emergencies', $location->accept_emergencies) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('accept_emergencies'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accept_emergencies') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.accept_emergencies_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.location.fields.coming_soon') }}</label>
                <select class="form-control {{ $errors->has('coming_soon') ? 'is-invalid' : '' }}" name="coming_soon" id="coming_soon" required>
                    <option value disabled {{ old('coming_soon', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Location::COMING_SOON_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('coming_soon', $location->coming_soon) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('coming_soon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coming_soon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.coming_soon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.location.fields.active') }}</label>
                <select class="form-control {{ $errors->has('active') ? 'is-invalid' : '' }}" name="active" id="active" required>
                    <option value disabled {{ old('active', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Location::ACTIVE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('active', $location->active) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location_imagepath">{{ trans('cruds.location.fields.location_imagepath') }}</label>
                <div class="needsclick dropzone {{ $errors->has('location_imagepath') ? 'is-invalid' : '' }}" id="location_imagepath-dropzone">
                </div>
                @if($errors->has('location_imagepath'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location_imagepath') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.location_imagepath_helper') }}</span>
            </div>
            @include('admin.locations.hours')
            <div class="form-group">
                <label for="directions">{{ trans('cruds.location.fields.directions') }}</label>
                <input class="form-control {{ $errors->has('directions') ? 'is-invalid' : '' }}" type="text" name="directions" id="directions" value="{{ old('directions', $location->directions) }}">
                @if($errors->has('directions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('directions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.location.fields.directions_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.locationImagepathDropzone = {
    url: '{{ route('admin.locations.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="location_imagepath"]').remove()
      $('form').append('<input type="hidden" name="location_imagepath" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="location_imagepath"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($location) && $location->location_imagepath)
      var file = {!! json_encode($location->location_imagepath) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="location_imagepath" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection