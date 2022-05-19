@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.order.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.typepay') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::TYPEPAY_SELECT[$order->typepay] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.client_order') }}
                                    </th>
                                    <td>
                                        {{ $order->client_order->name_client ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.clients_many') }}
                                    </th>
                                    <td>
                                        {{ $order->clients_many }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.clients_pages') }}
                                    </th>
                                    <td>
                                        {{ $order->clients_pages }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Время выполнения
                                    </th>
                                    <td>
                                        {{ $order->start_time }}&nbsp; -> &nbsp;{{ $order->end_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Языки
                                    </th>
                                    <td>
                                        {{ $order->languages_s->language ?? '' }}&nbsp; -> &nbsp;{{ $order->languages_na->language ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.product') }}
                                    </th>
                                    <td>
                                        @foreach($order->products as $key => $product)
                                            <span class="label label-info">{{ $product->name_file }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection