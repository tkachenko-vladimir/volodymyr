@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.schet.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.schets.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.schets.index') }}">
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