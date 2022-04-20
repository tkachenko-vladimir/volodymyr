<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePrimerRequest;
use App\Http\Requests\UpdatePrimerRequest;
use App\Http\Resources\Admin\PrimerResource;
use App\Models\Primer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrimerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('primer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrimerResource(Primer::with(['created_by'])->get());
    }

    public function store(StorePrimerRequest $request)
    {
        $primer = Primer::create($request->all());

        if ($request->input('type', false)) {
            $primer->addMedia(storage_path('tmp/uploads/' . basename($request->input('type'))))->toMediaCollection('type');
        }

        return (new PrimerResource($primer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Primer $primer)
    {
        abort_if(Gate::denies('primer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PrimerResource($primer->load(['created_by']));
    }

    public function update(UpdatePrimerRequest $request, Primer $primer)
    {
        $primer->update($request->all());

        if ($request->input('type', false)) {
            if (!$primer->type || $request->input('type') !== $primer->type->file_name) {
                if ($primer->type) {
                    $primer->type->delete();
                }
                $primer->addMedia(storage_path('tmp/uploads/' . basename($request->input('type'))))->toMediaCollection('type');
            }
        } elseif ($primer->type) {
            $primer->type->delete();
        }

        return (new PrimerResource($primer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Primer $primer)
    {
        abort_if(Gate::denies('primer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $primer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
