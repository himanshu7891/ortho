@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.docLibrary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doc-libraries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="doc_name">{{ trans('cruds.docLibrary.fields.doc_name') }}</label>
                <input class="form-control {{ $errors->has('doc_name') ? 'is-invalid' : '' }}" type="text" name="doc_name" id="doc_name" value="{{ old('doc_name', '') }}" required>
                @if($errors->has('doc_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doc_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.docLibrary.fields.doc_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url_path">{{ trans('cruds.docLibrary.fields.url_path') }}</label>
                <div class="needsclick dropzone {{ $errors->has('url_path') ? 'is-invalid' : '' }}" id="url_path-dropzone">
                </div>
                @if($errors->has('url_path'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url_path') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.docLibrary.fields.url_path_helper') }}</span>
                <b><i>Upload Only One File At A Time.</i></b>
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
    Dropzone.options.urlPathDropzone = {
    url: '{{ route('admin.doc-libraries.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="url_path"]').remove()
      $('form').append('<input type="hidden" name="url_path" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="url_path"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($docLibrary) && $docLibrary->url_path)
      var file = {!! json_encode($docLibrary->url_path) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="url_path" value="' + file.file_name + '">')
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