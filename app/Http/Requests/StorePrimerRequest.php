<?php

namespace App\Http\Requests;

use App\Models\Primer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePrimerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('primer_create');
    }

    public function rules()
    {
        return [
            'originalr_o' => [
                'string',
                'nullable',
            ],
        ];
    }
}
