@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name_file') ? 'has-error' : '' }}">
                            <label for="name_file">{{ trans('cruds.product.fields.name_file') }}</label>
                            <input class="form-control" type="text" name="name_file" id="name_file" value="{{ old('name_file', '') }}">
                            @if($errors->has('name_file'))
                                <span class="help-block" role="alert">{{ $errors->first('name_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('translator') ? 'has-error' : '' }}">
                            <label for="translator_id">{{ trans('cruds.product.fields.translator') }}</label>
                            <select class="form-control select2" name="translator_id" id="translator_id">
                                @foreach($translators as $id => $entry)
                                    <option value="{{ $id }}" {{ old('translator_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('translator'))
                                <span class="help-block" role="alert">{{ $errors->first('translator') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.translator_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('translator_page') ? 'has-error' : '' }}">
                            <label for="translator_page">{{ trans('cruds.product.fields.translator_page') }}</label>
                            <input class="form-control" type="number" name="translator_page" id="translator_page" value="{{ old('translator_page', '') }}" step="1">
                            @if($errors->has('translator_page'))
                                <span class="help-block" role="alert">{{ $errors->first('translator_page') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.translator_page_helper') }}</span>
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