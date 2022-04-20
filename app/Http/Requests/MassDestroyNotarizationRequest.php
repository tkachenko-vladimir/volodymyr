<?php

namespace App\Http\Requests;

use App\Models\Notarization;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNotarizationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('notarization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:notarizations,id',
        ];
    }
}
