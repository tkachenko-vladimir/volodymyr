@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.notarization.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.notarizations.update", [$notarization->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name_document') ? 'has-error' : '' }}">
                            <label for="name_document">{{ trans('cruds.notarization.fields.name_document') }}</label>
                            <input class="form-control" type="text" name="name_document" id="name_document" value="{{ old('name_document', $notarization->name_document) }}">
                            @if($errors->has('name_document'))
                                <span class="help-block" role="alert">{{ $errors->first('name_document') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.name_document_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('client_docum') ? 'has-error' : '' }}">
                            <label for="client_docum_id">{{ trans('cruds.notarization.fields.client_docum') }}</label>
                            <select class="form-control select2" name="client_docum_id" id="client_docum_id">
                                @foreach($client_docums as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('client_docum_id') ? old('client_docum_id') : $notarization->client_docum->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_docum'))
                                <span class="help-block" role="alert">{{ $errors->first('client_docum') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.client_docum_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('seal_translator') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="seal_translator" value="0">
                                <input type="checkbox" name="seal_translator" id="seal_translator" value="1" {{ $notarization->seal_translator || old('seal_translator', 0) === 1 ? 'checked' : '' }}>
                                <label for="seal_translator" style="font-weight: 400">{{ trans('cruds.notarization.fields.seal_translator') }}</label>
                            </div>
                            @if($errors->has('seal_translator'))
                                <span class="help-block" role="alert">{{ $errors->first('seal_translator') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.seal_translator_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status_docum') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.notarization.fields.status_docum') }}</label>
                            <select class="form-control" name="status_docum" id="status_docum">
                                <option value disabled {{ old('status_docum', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Notarization::STATUS_DOCUM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status_docum', $notarization->status_docum) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_docum'))
                                <span class="help-block" role="alert">{{ $errors->first('status_docum') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.status_docum_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection