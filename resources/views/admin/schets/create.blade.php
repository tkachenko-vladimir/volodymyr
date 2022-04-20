@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.schet.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.schets.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('klient_name') ? 'has-error' : '' }}">
                            <label for="klient_name_id">{{ trans('cruds.schet.fields.klient_name') }}</label>
                            <select class="form-control select2" name="klient_name_id" id="klient_name_id">
                                @foreach($klient_names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('klient_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('klient_name'))
                                <span class="help-block" role="alert">{{ $errors->first('klient_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.klient_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nomenclatura') ? 'has-error' : '' }}">
                            <label class="required" for="nomenclatura">{{ trans('cruds.schet.fields.nomenclatura') }}</label>
                            <input class="form-control" type="text" name="nomenclatura" id="nomenclatura" value="{{ old('nomenclatura', '') }}" required>
                            @if($errors->has('nomenclatura'))
                                <span class="help-block" role="alert">{{ $errors->first('nomenclatura') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.nomenclatura_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kol_vo') ? 'has-error' : '' }}">
                            <label for="kol_vo">{{ trans('cruds.schet.fields.kol_vo') }}</label>
                            <input class="form-control" type="number" name="kol_vo" id="kol_vo" value="{{ old('kol_vo', '') }}" step="1">
                            @if($errors->has('kol_vo'))
                                <span class="help-block" role="alert">{{ $errors->first('kol_vo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.schet.fields.kol_vo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('stoimost') ? 'has-error' : '' }}">
                            <label for="stoimost">{{ trans('cruds.schet.fields.stoimost') }}</label>
                            <input class="form-control" type="number" name="stoimost" id="stoimost" value="{{ old('stoimost', '') }}" step="1">
                            @if($errors->has('stoimost'))
                                <span class="help-block" role="alert">{{ $errors->first('stoimost') }}</span>
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