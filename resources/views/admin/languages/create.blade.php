@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.language.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.languages.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('language') ? 'has-error' : '' }}">
                            <label for="language">{{ trans('cruds.language.fields.language') }}</label>
                            <input class="form-control" type="text" name="language" id="language" value="{{ old('language', '') }}">
                            @if($errors->has('language'))
                                <span class="help-block" role="alert">{{ $errors->first('language') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.language.fields.language_helper') }}</span>
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