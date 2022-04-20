@extends('layouts.admin')
@section('content')
<div class="content">
    @can('schet_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.schets.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.schet.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.schet.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Schet">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.schet.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.schet.fields.klient_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.schet.fields.nomenclatura') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.schet.fields.kol_vo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.schet.fields.stoimost') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schets as $key => $schet)
                                    <tr data-entry-id="{{ $schet->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $schet->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $schet->klient_name->name_client ?? '' }}
                                        </td>
                                        <td>
                                            {{ $schet->nomenclatura ?? '' }}
                                        </td>
                                        <td>
                                            {{ $schet->kol_vo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $schet->stoimost ?? '' }}
                                        </td>
                                        <td>
                                            @can('schet_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.schets.show', $schet->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('schet_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.schets.edit', $schet->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('schet_delete')
                                                <form action="{{ route('admin.schets.destroy', $schet->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('schet_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.schets.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Schet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection