@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('notarization_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.notarizations.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.notarization.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.notarization.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Notarization">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notarization.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.notarization.fields.name_document') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.notarization.fields.client_docum') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.notarization.fields.seal_translator') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.notarization.fields.status_docum') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notarizations as $key => $notarization)
                                    <tr data-entry-id="{{ $notarization->id }}">
                                        <td>
                                            {{ $notarization->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $notarization->name_document ?? '' }}
                                        </td>
                                        <td>
                                            {{ $notarization->client_docum->name_client ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $notarization->seal_translator ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $notarization->seal_translator ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ App\Models\Notarization::STATUS_DOCUM_SELECT[$notarization->status_docum] ?? '' }}
                                        </td>
                                        <td>
                                            @can('notarization_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.notarizations.show', $notarization->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('notarization_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.notarizations.edit', $notarization->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('notarization_delete')
                                                <form action="{{ route('frontend.notarizations.destroy', $notarization->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('notarization_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.notarizations.massDestroy') }}",
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
  let table = $('.datatable-Notarization:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection