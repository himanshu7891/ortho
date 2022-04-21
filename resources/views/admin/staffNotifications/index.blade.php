@extends('layouts.admin')
@section('content')
@can('staff_notification_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.staff-notifications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.staffNotification.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.staffNotification.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StaffNotification">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.location_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.email_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_sms') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_voice') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.staffNotification.fields.notify_new_patient') }}
                        </th>
                        <!-- <th>
                            &nbsp;
                        </th> -->
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <!-- <td>
                        </td> -->
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        @endphp
                    @foreach($staffNotifications as $key => $staffNotification)
                        <tr data-entry-id="{{ $staffNotification->id }}"  class="staffModal">
                            <td>

                            </td>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                {{ $staffNotification->location_name ?? '' }}
                            </td>
                            <td>
                                {{ $staffNotification->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $staffNotification->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $staffNotification->email ?? '' }}
                            </td>
                            <td>
                                {{ $staffNotification->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $staffNotification->notify_sms == 1 ? 'True' : 'False' }}
                            </td>
                            <td>
                                {{ $staffNotification->notify_voice == 1 ? 'True' : 'False' }}
                            </td>
                            <td>
                                {{ $staffNotification->notify_email == 1 ? 'True' : 'False' }}
                            </td>
                            <td>
                                {{ $staffNotification->new_patient == 1 ? 'True' : 'False' }}
                            </td>
                            <!-- <td>
                                @can('staff_notification_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.staff-notifications.show', $staffNotification->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('staff_notification_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.staff-notifications.edit', $staffNotification->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('staff_notification_delete')
                                    <form action="{{ route('admin.staff-notifications.destroy', $staffNotification->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td> -->

                        </tr>
                        @php
                        $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Open</button>

<div class="modal fade modalForStaff" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="" enctype="multipart/form-data" class="staffForm">
        @csrf
      <div class="modal-body">
            <input type="hidden" name="id" id="id">
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
        
      </div>
      <div class="modal-footer">
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                {{ trans('global.save') }}
            </button>
            <button type="button" class="btn btn-secondary closeModal">{{ trans('global.close') }}</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('staff_notification_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.staff-notifications.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    // order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-StaffNotification:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})


//Submit Modal
jQuery(function($) {
    $('body').on('click','.staffModal',function(){
        event.preventDefault();
        var id = $(this).attr('data-entry-id');
        var $form = $(this);
        // var $target = $($form.attr('data-target'));

        $.ajax({
            type: 'get',
            url: '{{route("admin.staff-notifications.getUser")}}',
            data: {'id':id},

            success: function(data, status) {
                $("#id").val(data.data.id);
                $("#first_name").val(data.data.first_name);
                $("#last_name").val(data.data.last_name);
                $("#email").val(data.data.email);
                $("#phone_number").val(data.data.phone_number);
                if(data.data.notify_sms == '1'){
                    $("#notify_sms").prop('checked', true);
                }
                if(data.data.notify_email == '1'){
                    $("#notify_email").prop('checked', true);
                }
                if(data.data.notify_voice == '1'){
                    $("#notify_voice").prop('checked', true);
                }
                if(data.data.new_patient == '1'){
                    $("#new_patient").prop('checked', true);
                }
                console.log(data.userLocation);
                $('#locations').val(data.userLocation).trigger('change');
                // $("#locations").val(data.data.phone_number);
                
                $('.modalForStaff').modal('show');
                console.log(data);
            }
        });

    });
});
$('body').on('click','.closeModal',function(){
    $('.staffForm')[0].reset();
    $('.modalForStaff').modal('hide');
});

//Submit Modal
jQuery(function($) {
    // $('body').on('submit','.staffForm',function(){

    //     event.preventDefault();
    //     alert();
    //     var $form = $(this);
    //     var id = $('#id').val();
    //     var url = "{{url('admin/users/')}}"+"/"+id; 
    //     // var $target = $($form.attr('data-target'));
    //     console.log($form.serialize());
    //     $.ajax({
    //         type: $form.attr('method'),
    //         url: url,
    //         data: $form.serialize(),

    //         success: function(data, status) {
    //             if(data.msg){alert(data.msg);}
    //             location.reload();
    //             Console.log(data.msg);
    //         }
    //     });

    // });


    //========================================
    $('body').on('submit','.staffForm',function(){

        event.preventDefault();
        var $form = $(this);
        var id = $('#id').val();
        var url = "{{url('admin/staff-notifications/updateStaff')}}"; 
        // var $target = $($form.attr('data-target'));
        console.log($form.serialize());
        $.ajax({
            type: 'POST',
            url: url,
            data: $form.serialize(),

            success: function(data, status) {
                if(data.msg){alert(data.msg);}
                location.reload();
                Console.log(data.msg);
            }
        });

    });
});
</script>
@endsection