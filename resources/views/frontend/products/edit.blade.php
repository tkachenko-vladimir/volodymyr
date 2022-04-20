@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.products.update", [$product->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name_file">{{ trans('cruds.product.fields.name_file') }}</label>
                            <input class="form-control" type="text" name="name_file" id="name_file" value="{{ old('name_file', $product->name_file) }}">
                            @if($errors->has('name_file'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name_file') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_file_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="translator_id">{{ trans('cruds.product.fields.translator') }}</label>
                            <select class="form-control select2" name="translator_id" id="translator_id">
                                @foreach($translators as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('translator_id') ? old('translator_id') : $product->translator->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('translator'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('translator') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.translator_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="translator_page">{{ trans('cruds.product.fields.translator_page') }}</label>
                            <input class="form-control" type="number" name="translator_page" id="translator_page" value="{{ old('translator_page', $product->translator_page) }}" step="1">
                            @if($errors->has('translator_page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('translator_page') }}
                                </div>
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