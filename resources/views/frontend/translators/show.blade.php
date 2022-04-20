@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.translator.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.translators.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.translator.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $translator->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.translator.fields.fio') }}
                                    </th>
                                    <td>
                                        {{ $translator->fio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.translator.fields.translator') }}
                                    </th>
                                    <td>
                                        {{ $translator->translator->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.translator.fields.translator_lang') }}
                                    </th>
                                    <td>
                                        @foreach($translator->translator_langs as $key => $translator_lang)
                                            <span class="label label-info">{{ $translator_lang->language }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.translator.fields.number_card') }}
                                    </th>
                                    <td>
                                        {{ $translator->number_card }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.translator.fields.info') }}
                                    </th>
                                    <td>
                                        {!! $translator->info !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.translators.index') }}">
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