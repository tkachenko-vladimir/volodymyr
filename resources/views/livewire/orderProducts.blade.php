<div>
    <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
        @method('POST')
        @csrf

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group {{ $errors->has('client_order') ? 'has-error' : '' }}">
                    <label class="required" for="client_order_id">{{ trans('cruds.order.fields.client_order') }}</label>
                    <select class="form-control select2" name="client_order_id" id="client_order_id" required>
                        @foreach($client_orders as $id => $entry)
                            <option value="{{ $id }}" {{ old('client_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('client_order'))
                        <span class="help-block" role="alert">{{ $errors->first('client_order') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.client_order_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                    <select class="form-control" name="status" id="status" required>
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', 'work') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status'))
                        <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('typepay') ? 'has-error' : '' }}">
                    <label>{{ trans('cruds.order.fields.typepay') }}</label>
                    <select class="form-control" name="typepay" id="typepay">
                        <option value disabled {{ old('typepay', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Order::TYPEPAY_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('typepay', 'Beznal') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('typepay'))
                        <span class="help-block" role="alert">{{ $errors->first('typepay') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.typepay_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('clients_many') ? 'has-error' : '' }}">
                    <label for="clients_many">{{ trans('cruds.order.fields.clients_many') }}</label>
                    <input class="form-control" type="number" name="clients_many" id="clients_many" value="{{ old('clients_many', '') }}" step="0.01">
                    @if($errors->has('clients_many'))
                        <span class="help-block" role="alert">{{ $errors->first('clients_many') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.clients_many_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('clients_pages') ? 'has-error' : '' }}">
                    <label for="clients_pages">{{ trans('cruds.order.fields.clients_pages') }}</label>
                    <input class="form-control" type="number" name="clients_pages" id="clients_pages" value="{{ old('clients_pages', '') }}" step="1">
                    @if($errors->has('clients_pages'))
                        <span class="help-block" role="alert">{{ $errors->first('clients_pages') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.clients_pages_helper') }}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('languages_s') ? 'has-error' : '' }}">
                    <label for="languages_s_id">{{ trans('cruds.order.fields.languages_s') }}</label>
                    <select class="form-control select2" name="languages_s_id" id="languages_s_id">
                        @foreach($languages_s as $id => $entry)
                            <option value="{{ $id }}" {{ old('languages_s_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('languages_s'))
                        <span class="help-block" role="alert">{{ $errors->first('languages_s') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.languages_s_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('languages_na') ? 'has-error' : '' }}">
                    <label for="languages_na_id">{{ trans('cruds.order.fields.languages_na') }}</label>
                    <select class="form-control select2" name="languages_na_id" id="languages_na_id">
                        @foreach($languages_nas as $id => $entry)
                            <option value="{{ $id }}" {{ old('languages_na_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('languages_na'))
                        <span class="help-block" role="alert">{{ $errors->first('languages_na') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.languages_na_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                    <label for="start_time">{{ trans('cruds.order.fields.start_time') }}</label>
                    <input class="form-control date" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}">
                    @if($errors->has('start_time'))
                        <span class="help-block" role="alert">{{ $errors->first('start_time') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.start_time_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                    <label for="end_time">{{ trans('cruds.order.fields.end_time') }}</label>
                    <input class="form-control date" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}">
                    @if($errors->has('end_time'))
                        <span class="help-block" role="alert">{{ $errors->first('end_time') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.end_time_helper') }}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
                    </div>
                    <div class="panel-body">
                        @foreach ($products as $index => $product)
                        <div class="row" wire:key="product-{{ $product['id'] }}">
                            <input type="hidden" name="products[]" value="{{ $product['id'] }}">
                            <div class="col-lg-3">
                                <div class="form-group {{ $errors->has('name_file') ? 'has-error' : '' }}">
                                    <label>{{ trans('cruds.product.fields.name_file') }}</label>
                                    <input
                                        wire:model.defer="products.{{ $index }}.name_file"
                                        class="form-control"
                                        type="text"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>{{ trans('cruds.product.fields.translator') }}</label>
                                    <select
                                        class="form-control select2"
                                        wire:model.defer="products.{{ $index }}.translator_id"
                                    >
                                        @foreach($translators as $id => $fio)
                                            <option value="{{ $id }}">
                                                {{ $fio }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>{{ trans('cruds.product.fields.translator_page') }}</label>
                                    <input
                                        wire:model.defer="products.{{ $index }}.translator_page"
                                        class="form-control"
                                        type="number"
                                        step="1"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="d-block text-bold">&nbsp;</div>
                                    <button
                                        class="btn btn-sm btn-success"
                                        wire:click.prevent="updateProduct({{ $index }})">
                                        {{ __('Обновить') }}
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-sm btn-danger"
                                        wire:click="removeProduct({{ $index }})">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="row">
                            <div class="col-lg-12">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-secondary"
                                    wire:click="addProduct">
                                    {{ __('Добавить продукт') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }} {{ trans('cruds.order.title_singular') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
