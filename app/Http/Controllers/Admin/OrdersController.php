<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Client;
use App\Models\Language;
use App\Models\Order;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['client_order', 'languages_s', 'languages_na', 'products'])->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client_orders = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages_s = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages_nas = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name_file', 'id');

        return view('admin.orders.create', compact('client_orders', 'languages_nas', 'languages_s', 'products'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->products()->sync($request->input('products', []));

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client_orders = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages_s = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');

        $languages_nas = Language::pluck('language', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name_file', 'id');

        $order->load('client_order', 'languages_s', 'languages_na', 'products');

        return view('admin.orders.edit', compact('client_orders', 'languages_nas', 'languages_s', 'order', 'products'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->products()->sync($request->input('products', []));

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('client_order', 'languages_s', 'languages_na', 'products');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
