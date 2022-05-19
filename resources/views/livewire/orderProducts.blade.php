<div>
    <form wire:submit.prevent="storeProduct">

        @csrf

        <div class="row">
            <div class="col-lg-4" >
                <div class="form-group {{ $errors->has('client_order') ? 'has-error' : '' }}">
                    <label class="required" for="client_order_id">{{ trans('cruds.order.fields.client_order') }}</label>
                    <div wire:ignore>
                        <select wire:model="client_order_id" data-pharaonic="select2" data-component-id="{{ $this->id }}" class="form-control" name="client_order_id" id="client_order_id" required>
                            <option value {{ old('client_order_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach ($client_orders as $id => $client_order)
                                <option value="{{ $id }}" {{ old('client_order_id') == $id ? 'selected' : '' }}>{{ $id }}{{ $client_order}}</option>
                                @endforeach
                        </select>
                    </div>
                   <?php var_dump($client_order_id)  ?>
                   <?php var_dump($this->id)  ?>
                    @if($errors->has('client_order'))
                        <span class="help-block" role="alert">{{ $errors->first('client_order') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.client_order_helper') }}</span>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                    <select wire:model="status" class="form-control" name="status" id="status" required>
                        <option value {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Order::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', 'work') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <?php var_dump($status)  ?>
                    @if($errors->has('status'))
                        <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('typepay') ? 'has-error' : '' }}">
                    <label>{{ trans('cruds.order.fields.typepay') }}</label>
                    <select wire:model="typepay" class="form-control" name="typepay" id="typepay">
                        <option value {{ old('typepay', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Order::TYPEPAY_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('typepay', 'Beznal') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    start_time
                    @if($errors->has('typepay'))
                        <span class="help-block" role="alert">{{ $errors->first('typepay') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.typepay_helper') }}</span>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('clients_many') ? 'has-error' : '' }}">
                    <label for="clients_many">{{ trans('cruds.order.fields.clients_many') }}</label>
                    <input wire:model="clients_many" class="form-control" type="number" name="clients_many" id="clients_many" value="{{ old('clients_many', '') }}" step="0.01">
                    <?php var_dump($clients_many)  ?>
                    @if($errors->has('clients_many'))
                        <span class="help-block" role="alert">{{ $errors->first('clients_many') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.clients_many_helper') }}</span>
                </div>
            </div>
            
            <div class="col-lg-2">
                <div class="form-group {{ $errors->has('clients_pages') ? 'has-error' : '' }}">
                    <label for="clients_pages">{{ trans('cruds.order.fields.clients_pages') }}</label>
                    <input wire:model="clients_pages" class="form-control" type="number" name="clients_pages" id="clients_pages" value="{{ old('clients_pages', '') }}" step="1">
                    <?php var_dump($clients_pages)  ?>
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
                     <div wire:ignore>
                        <select wire:model="languages_s_id" data-pharaonic="select2" data-component-id="{{ $this->id }}" class="form-control">
                            <option value {{ old('languages_s_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach($languages_s as $id => $entry)
                                <option value="{{ $id }}" {{ old('languages_s_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                    </div>
                    <?php var_dump($languages_s_id)  ?>
                    @if($errors->has('languages_s'))
                        <span class="help-block" role="alert">{{ $errors->first('languages_s') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.languages_s_helper') }}</span>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('languages_na') ? 'has-error' : '' }}">
                    <label for="languages_na_id">{{ trans('cruds.order.fields.languages_na') }}</label>
                    <div wire:ignore>
                        <select wire:model="languages_na_id" data-pharaonic="select2" data-component-id="{{ $this->id }}" class="form-control">
                            <option value {{ old('languages_na_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach($languages_nas as $id => $entry)
                                <option value="{{ $id }}" {{ old('languages_na_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                    </div>
                    <?php var_dump($languages_na_id)  ?>
                    @if($errors->has('languages_na'))
                        <span class="help-block" role="alert">{{ $errors->first('languages_na') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.languages_na_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                    <label for="start_time">{{ trans('cruds.order.fields.start_time') }}</label>
                    <input wire:model.lazy="start_time" type="text" class="form-control date"
                    id="start_time"
                    placeholder="START DATE">
                    <?php var_dump($start_time)  ?>
                    @if($errors->has('start_time'))
                        <span class="help-block" role="alert">{{ $errors->first('start_time') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.order.fields.start_time_helper') }}</span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                    <label for="end_time">{{ trans('cruds.order.fields.end_time') }}</label>
                    <input wire:model.lazy="end_time" type="text" class="form-control date"
                    id="end_time"
                    placeholder="END DATE">
                    <?php var_dump($end_time)  ?>
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
                                    <div wire:ignore>
                                        <select
                                            data-pharaonic="select2" data-component-id="{{ $this->id }}" class="form-control"
                                            wire:model.defer="products.{{ $index }}.translator_id">
                                            @foreach($translators as $id => $fio)
                                                <option value="{{ $id }}">
                                                    {{ $fio }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <?php var_dump($fio)  ?>
                                        <?php var_dump($this->id)  ?>
                                    </div>
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
                                    class="btn btn-sm btn-success"
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
                    <button
                        class="btn btn-sm btn-primary"
                        wire:click.prevent="storeProduct">
                        {{ trans('global.save') }} {{ trans('cruds.order.title_singular') }}
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
    new Pikaday({
        field: document.getElementById('start_time'),
        format: 'DD/MM/YYYY'
    })
</script>
<script>
    new Pikaday({
        field: document.getElementById('end_time'),
        format: 'DD/MM/YYYY'
    })
</script>
@endsection
@push('scripts')
    <script>
        document.addEventListener("livewire:load", () => {
            let el = $('#categories')
            initSelect()

            Livewire.hook('message.processed', (message, component) => {
                initSelect()
            })

            // Only needed if doing save without redirect
            /* Livewire.on('setCategoriesSelect', values => {
                el.val(values).trigger('change.select2')
            })*/

            el.on('change', function (e) {
                @this.set('productCategories', el.select2("val"))
            })

            function initSelect () {
                el.select2({
                    placeholder: '{{__('Select your option')}}',
                    allowClear: !el.attr('required'),
                })
            }
        })
    </script>
@endpush