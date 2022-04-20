@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.schet.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.schets.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.schet.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $schet->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.schet.fields.klient_name') }}
                                    </th>
                                    <td>
                                        {{ $schet->klient_name->name_client ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.schet.fields.nomenclatura') }}
                                    </th>
                                    <td>
                                        {{ $schet->nomenclatura }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.schet.fields.kol_vo') }}
                                    </th>
                                    <td>
                                        {{ $schet->kol_vo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.schet.fields.stoimost') }}
                                    </th>
                                    <td>
                                        {{ $schet->stoimost }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.schets.index') }}">
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