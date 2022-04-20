<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPrimerRequest;
use App\Http\Requests\StorePrimerRequest;
use App\Http\Requests\UpdatePrimerRequest;
use App\Models\Primer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PrimerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('primer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $primers = Primer::with(['created_by', 'media'])->get();

        return view('frontend.primers.index', compact('primers'));
    }

    public function create()
    {
        abort_if(Gate::denies('primer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.primers.create');
    }

    public function store(StorePrimerRequest $request)
    {
        $primer = Primer::create($request->all());

        if ($request->input('type', false)) {
            $primer->addMedia(storage_path('tmp/uploads/' . basename($request->input('type'))))->toMediaCollection('type');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $primer->id]);
        }

        return redirect()->route('frontend.primers.index');
    }

    public function edit(Primer $primer)
    {
        abort_if(Gate::denies('primer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $primer->load('created_by');

        return view('frontend.primers.edit', compact('primer'));
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

        return redirect()->route('frontend.primers.index');
    }

    public function show(Primer $primer)
    {
        abort_if(Gate::denies('primer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $primer->load('created_by');

        return view('frontend.primers.show', compact('primer'));
    }

    public function destroy(Primer $primer)
    {
        abort_if(Gate::denies('primer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $primer->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrimerRequest $request)
    {
        Primer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('primer_create') && Gate::denies('primer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Primer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
