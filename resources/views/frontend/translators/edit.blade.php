@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.translator.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.translators.update", [$translator->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="fio">{{ trans('cruds.translator.fields.fio') }}</label>
                            <input class="form-control" type="text" name="fio" id="fio" value="{{ old('fio', $translator->fio) }}">
                            @if($errors->has('fio'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fio') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.translator.fields.fio_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="translator_id">{{ trans('cruds.translator.fields.translator') }}</label>
                            <select class="form-control select2" name="translator_id" id="translator_id">
                                @foreach($translators as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('translator_id') ? old('translator_id') : $translator->translator->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('translator'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('translator') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.translator.fields.translator_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="translator_langs">{{ trans('cruds.translator.fields.translator_lang') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="translator_langs[]" id="translator_langs" multiple>
                                @foreach($translator_langs as $id => $translator_lang)
                                    <option value="{{ $id }}" {{ (in_array($id, old('translator_langs', [])) || $translator->translator_langs->contains($id)) ? 'selected' : '' }}>{{ $translator_lang }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('translator_langs'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('translator_langs') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.translator.fields.translator_lang_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="number_card">{{ trans('cruds.translator.fields.number_card') }}</label>
                            <input class="form-control" type="text" name="number_card" id="number_card" value="{{ old('number_card', $translator->number_card) }}">
                            @if($errors->has('number_card'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('number_card') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.translator.fields.number_card_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="info">{{ trans('cruds.translator.fields.info') }}</label>
                            <textarea class="form-control ckeditor" name="info" id="info">{!! old('info', $translator->info) !!}</textarea>
                            @if($errors->has('info'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('info') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.translator.fields.info_helper') }}</span>
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
                xhr.open('POST', '{{ route('frontend.translators.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $translator->id ?? 0 }}');
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