@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.orthoChat.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OrthoChat">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.phone_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.ortho_chat_access') }}
                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.location') }}
                        </th>
                        <th>
                            {{ trans('cruds.orthoChat.fields.action') }}
                        </th>
                        
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
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($orthoChats as $key => $orthoChat)
                        <tr data-entry-id="{{ $orthoChat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                {{ $orthoChat->first_name ?? '' }}, {{ $orthoChat->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $orthoChat->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $orthoChat->email ?? '' }}
                            </td>
                            <td>
                                <input  type="checkbox" class="is_doctor" data-id="{{ $orthoChat->id }}" @if($orthoChat->is_doctor) checked @endif>
                            </td>
                            <td>
                                @if($orthoChat->is_doctor) <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$i}}">Location</button> @endif
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('cruds.orthoChat.fields.assign_location') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        <form action="{{ route('admin.ortho-chats.saveLocation') }}" class="doctorLocation" method="POST">
                                          <div class="modal-body">
                                            <input type="hidden" name="doctor_id" value="{{$orthoChat->id}}">
                                            <select class="form-control select2 {{ $errors->has('locations') ? 'is-invalid' : '' }}" name="locations[]" id="locations" multiple required>
                                                @foreach($locations as $id => $location)
                                                    <option value="{{ $id }}" @php if(App\Models\DoctorLocation::select('locationid')->where([['userid',$orthoChat->id],['locationid',$id]])->first()){ echo 'selected';} @endphp>{{ $location }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('global.close') }}</button>
                                            <button type="submit" class="btn btn-primary">{{ trans('global.save_changes') }}</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                            </td>
                            <td>
                                @can('ortho_chat_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ortho-chats.show', $orthoChat->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan


                                @can('ortho_chat_delete')
                                    <form action="{{ route('admin.ortho-chats.destroy', $orthoChat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

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


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ortho_chat_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ortho-chats.massDestroy') }}",
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
  let table = $('.datatable-OrthoChat:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
    $('body').on('submit','.doctorLocation',function(){

        event.preventDefault();
        var $form = $(this);
        // var $target = $($form.attr('data-target'));

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                if(data.msg){alert(data.msg);}
                location.reload();
                console.log(data.msg);
            }
        });

    });
});
jQuery(function($) {
    $('body').on('click','.is_doctor',function(){
        var isCheked = 0;
        if ($(this).is(':checked')) {
            isCheked = 1;
        }
        event.preventDefault();
        var id = $(this).attr('data-id');
        // var $form = $(this);
        // var $target = $($form.attr('data-target'));
        var url = "{{route('admin.ortho-chats.updateDoctorsStatus')}}";
        $.ajax({
            type: 'get',
            url: url,
            data: {'id':id,'isCheked':isCheked},

            success: function(data, status) {
                if(data.msg){alert(data.msg);}
                location.reload();
                console.log(data.msg);
            }
        });

    });
});
</script>
@endsection