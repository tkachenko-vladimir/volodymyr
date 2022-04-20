<?php

namespace App\Http\Requests;

use App\Models\Notarization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNotarizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notarization_edit');
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
