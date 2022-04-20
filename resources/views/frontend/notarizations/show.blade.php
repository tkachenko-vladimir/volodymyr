@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.notarization.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.notarizations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notarization.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $notarization->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notarization.fields.name_document') }}
                                    </th>
                                    <td>
                                        {{ $notarization->name_document }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notarization.fields.client_docum') }}
                                    </th>
                                    <td>
                                        {{ $notarization->client_docum->name_client ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notarization.fields.seal_translator') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $notarization->seal_translator ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notarization.fields.status_docum') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Notarization::STATUS_DOCUM_SELECT[$notarization->status_docum] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.notarizations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection