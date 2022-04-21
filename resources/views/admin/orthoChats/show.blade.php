@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.orthoChat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ortho-chats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.id') }}
                        </th>
                        <td>
                            {{ $orthoChat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.name') }}
                        </th>
                        <td>
                            {{ $orthoChat->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.phone_no') }}
                        </th>
                        <td>
                            {{ $orthoChat->phone_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.email') }}
                        </th>
                        <td>
                            {{ $orthoChat->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.ortho_chat_access') }}
                        </th>
                        <td>
                            {{ $orthoChat->ortho_chat_access }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.location') }}
                        </th>
                        <td>
                            {{ $orthoChat->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orthoChat.fields.action') }}
                        </th>
                        <td>
                            {{ $orthoChat->action }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ortho-chats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection