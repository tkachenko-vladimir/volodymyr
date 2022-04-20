<?php

namespace App\Http\Requests;

use App\Models\Schet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSchetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('schet_edit');
    }

    public function rules()
    {
        return [
            'nomenclatura' => [
                'string',
                'required',
            ],
            'kol_vo' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stoimost' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
