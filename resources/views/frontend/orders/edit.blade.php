@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.update", [$order->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.order.fields.typepay') }}</label>
                            <select class="form-control" name="typepay" id="typepay">
                                <option value disabled {{ old('typepay', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Order::TYPEPAY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('typepay', $order->typepay) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('typepay'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('typepay') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.typepay_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="client_order_id">{{ trans('cruds.order.fields.client_order') }}</label>
                            <select class="form-control select2" name="client_order_id" id="client_order_id" required>
                                @foreach($client_orders as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('client_order_id') ? old('client_order_id') : $order->client_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.client_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="clients_many">{{ trans('cruds.order.fields.clients_many') }}</label>
                            <input class="form-control" type="number" name="clients_many" id="clients_many" value="{{ old('clients_many', $order->clients_many) }}" step="0.01">
                            @if($errors->has('clients_many'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('clients_many') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.clients_many_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="clients_pages">{{ trans('cruds.order.fields.clients_pages') }}</label>
                            <input class="form-control" type="number" name="clients_pages" id="clients_pages" value="{{ old('clients_pages', $order->clients_pages) }}" step="1">
                            @if($errors->has('clients_pages'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('clients_pages') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.clients_pages_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="start_time">{{ trans('cruds.order.fields.start_time') }}</label>
                            <input class="form-control date" type="text" name="start_time" id="start_time" value="{{ old('start_time', $order->start_time) }}">
                            @if($errors->has('start_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.start_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="end_time">{{ trans('cruds.order.fields.end_time') }}</label>
                            <input class="form-control date" type="text" name="end_time" id="end_time" value="{{ old('end_time', $order->end_time) }}">
                            @if($errors->has('end_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.end_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="languages_s_id">{{ trans('cruds.order.fields.languages_s') }}</label>
                            <select class="form-control select2" name="languages_s_id" id="languages_s_id">
                                @foreach($languages_s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('languages_s_id') ? old('languages_s_id') : $order->languages_s->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('languages_s'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('languages_s') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.languages_s_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="languages_na_id">{{ trans('cruds.order.fields.languages_na') }}</label>
                            <select class="form-control select2" name="languages_na_id" id="languages_na_id">
                                @foreach($languages_nas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('languages_na_id') ? old('languages_na_id') : $order->languages_na->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('languages_na'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('languages_na') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.languages_na_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="products">{{ trans('cruds.order.fields.product') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="products[]" id="products" multiple>
                                @foreach($products as $id => $product)
                                    <option value="{{ $id }}" {{ (in_array($id, old('products', [])) || $order->products->contains($id)) ? 'selected' : '' }}>{{ $product }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.product_helper') }}</span>
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