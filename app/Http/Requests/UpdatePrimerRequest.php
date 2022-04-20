<?php

namespace App\Http\Requests;

use App\Models\Primer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePrimerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('primer_edit');
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
