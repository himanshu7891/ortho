@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.orthoChat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ortho-chats.update", [$orthoChat->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.orthoChat.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $orthoChat->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orthoChat.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_no">{{ trans('cruds.orthoChat.fields.phone_no') }}</label>
                <input class="form-control {{ $errors->has('phone_no') ? 'is-invalid' : '' }}" type="text" name="phone_no" id="phone_no" value="{{ old('phone_no', $orthoChat->phone_no) }}">
                @if($errors->has('phone_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orthoChat.fields.phone_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.orthoChat.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $orthoChat->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orthoChat.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ortho_chat_access">{{ trans('cruds.orthoChat.fields.ortho_chat_access') }}</label>
                <input class="form-control {{ $errors->has('ortho_chat_access') ? 'is-invalid' : '' }}" type="text" name="ortho_chat_access" id="ortho_chat_access" value="{{ old('ortho_chat_access', $orthoChat->ortho_chat_access) }}">
                @if($errors->has('ortho_chat_access'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ortho_chat_access') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orthoChat.fields.ortho_chat_access_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.orthoChat.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', $orthoChat->location) }}">
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orthoChat.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="action">{{ trans('cruds.orthoChat.fields.action') }}</label>
                <input class="form-control {{ $errors->has('action') ? 'is-invalid' : '' }}" type="text" name="action" id="action" value="{{ old('action', $orthoChat->action) }}">
                @if($errors->has('action'))
                    <div class="invalid-feedback">
                        {{ $errors->first('action') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orthoChat.fields.action_helper') }}</span>
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