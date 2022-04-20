@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.notarization.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.notarizations.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="name_document">{{ trans('cruds.notarization.fields.name_document') }}</label>
                            <input class="form-control" type="text" name="name_document" id="name_document" value="{{ old('name_document', '') }}">
                            @if($errors->has('name_document'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name_document') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.name_document_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="client_docum_id">{{ trans('cruds.notarization.fields.client_docum') }}</label>
                            <select class="form-control select2" name="client_docum_id" id="client_docum_id">
                                @foreach($client_docums as $id => $entry)
                                    <option value="{{ $id }}" {{ old('client_docum_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_docum'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client_docum') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.client_docum_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="seal_translator" value="0">
                                <input type="checkbox" name="seal_translator" id="seal_translator" value="1" {{ old('seal_translator', 0) == 1 ? 'checked' : '' }}>
                                <label for="seal_translator">{{ trans('cruds.notarization.fields.seal_translator') }}</label>
                            </div>
                            @if($errors->has('seal_translator'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('seal_translator') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notarization.fields.seal_translator_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.notarization.fields.status_docum') }}</label>
                            <select class="form-control" name="status_docum" id="status_docum">
                                <option value disabled {{ old('status_docum', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Notarization::STATUS_DOCUM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status_docum', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_docum'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status_docum') }}
                                </div>
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