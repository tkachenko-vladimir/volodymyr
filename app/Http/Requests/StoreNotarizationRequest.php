<?php

namespace App\Http\Requests;

use App\Models\Notarization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotarizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notarization_create');
    }

    public function rules()
    {
        return [
            'name_document' => [
                'string',
                'nullable',
            ],
        ];
    }
}
