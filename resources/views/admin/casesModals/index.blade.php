@extends('layouts.admin')
@section('content')
@can('cases_modal_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cases-modals.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.casesModal.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.casesModal.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CasesModal">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_dob') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.patient_gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.originator') }}
                        </th>
                        <th>
                            {{ trans('cruds.casesModal.fields.collaborator') }}
                        </th>
                        <th>
                            &nbsp;
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\CasesModal::PATIENT_GENDER_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i =1;
                    @endphp
                    @foreach($casesModals as $key => $casesModal)
                        <tr data-entry-id="{{ $casesModal->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                {{ $casesModal->patient_first_name ?? '' }}
                            </td>
                            <td>
                                {{ $casesModal->patient_last_name ?? '' }}
                            </td>
                            <td>
                                {{ $casesModal->patient_dob ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CasesModal::PATIENT_GENDER_RADIO[$casesModal->patient_gender] ?? '' }}
                            </td>
                            <td>
                                {{ $casesModal->description ?? '' }}
                            </td>
                            <td>
                                {{ $casesModal->originator_name ?? '' }}
                            </td>
                            <td>
                                @php
                                if($casesModal->colobrator_name){
                                    $colobrator_names = json_decode($casesModal->colobrator_name);
                                    if(is_array($colobrator_names) || is_object($colobrator_names)){
                                        foreach($colobrator_names as $colobrator_name){
                                            if(is_array($colobrator_name) || is_object($colobrator_name)){
                                                foreach((array) $colobrator_name as $cn){
                                                    echo $cn .' ';
                                                }                                            
                                            }
                                        }
                                    }
                                }
                                @endphp
                                <!-- <span style="display:none">{{ $casesModal->status ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $casesModal->status ? 'checked' : '' }}> -->
                            </td>
                            <td>
                                @can('cases_modal_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cases-modals.show', $casesModal->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cases_modal_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cases-modals.edit', $casesModal->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cases_modal_delete')
                                    <form action="{{ route('admin.cases-modals.destroy', $casesModal->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cases_modal_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cases-modals.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-CasesModal:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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

</script>
@endsection