@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name_client') ? 'has-error' : '' }}">
                            <label class="required" for="name_client">{{ trans('cruds.client.fields.name_client') }}</label>
                            <input class="form-control" type="text" name="name_client" id="name_client" value="{{ old('name_client', '') }}" required>
                            @if($errors->has('name_client'))
                                <span class="help-block" role="alert">{{ $errors->first('name_client') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.name_client_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email_client') ? 'has-error' : '' }}">
                            <label class="required" for="email_client">{{ trans('cruds.client.fields.email_client') }}</label>
                            <input class="form-control" type="email" name="email_client" id="email_client" value="{{ old('email_client') }}" required>
                            @if($errors->has('email_client'))
                                <span class="help-block" role="alert">{{ $errors->first('email_client') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.email_client_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                            <textarea class="form-control" name="phone" id="phone">{{ old('phone') }}</textarea>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('client_user') ? 'has-error' : '' }}">
                            <label for="client_user_id">{{ trans('cruds.client.fields.client_user') }}</label>
                            <select class="form-control select2" name="client_user_id" id="client_user_id">
                                @foreach($client_users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('client_user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_user'))
                                <span class="help-block" role="alert">{{ $errors->first('client_user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.client_user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                            <textarea class="form-control ckeditor" name="address" id="address">{!! old('address') !!}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('info_client') ? 'has-error' : '' }}">
                            <label for="info_client">{{ trans('cruds.client.fields.info_client') }}</label>
                            <textarea class="form-control ckeditor" name="info_client" id="info_client">{!! old('info_client') !!}</textarea>
                            @if($errors->has('info_client'))
                                <span class="help-block" role="alert">{{ $errors->first('info_client') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.info_client_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.clients.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $client->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection