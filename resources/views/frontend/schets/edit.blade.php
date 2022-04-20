@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.schet.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.schets.update", [$schet->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="klient_name_id">{{ trans('cruds.schet.fields.klient_name') }}</label>
                            <select class="form-control select2" name="klient_name_id" id="klient_name_id">
                                @foreach($klient_names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('klient_name_id') ? old('klient_name_id') : $schet->klient_name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('klient_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('klient_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.klient_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="nomenclatura">{{ trans('cruds.schet.fields.nomenclatura') }}</label>
                            <input class="form-control" type="text" name="nomenclatura" id="nomenclatura" value="{{ old('nomenclatura', $schet->nomenclatura) }}" required>
                            @if($errors->has('nomenclatura'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nomenclatura') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.nomenclatura_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kol_vo">{{ trans('cruds.schet.fields.kol_vo') }}</label>
                            <input class="form-control" type="number" name="kol_vo" id="kol_vo" value="{{ old('kol_vo', $schet->kol_vo) }}" step="1">
                            @if($errors->has('kol_vo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kol_vo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.kol_vo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="stoimost">{{ trans('cruds.schet.fields.stoimost') }}</label>
                            <input class="form-control" type="number" name="stoimost" id="stoimost" value="{{ old('stoimost', $schet->stoimost) }}" step="1">
                            @if($errors->has('stoimost'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stoimost') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.stoimost_helper') }}</span>
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