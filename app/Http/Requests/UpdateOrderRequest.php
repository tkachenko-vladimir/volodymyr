<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'client_order_id' => [
                'required',
                'integer',
            ],
            'clients_pages' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'start_time' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_time' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'array',
            ],
        ];
    }
}
