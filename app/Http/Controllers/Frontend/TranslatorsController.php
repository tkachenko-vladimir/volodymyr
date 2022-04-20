<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTranslatorRequest;
use App\Http\Requests\StoreTranslatorRequest;
use App\Http\Requests\UpdateTranslatorRequest;
use App\Models\Language;
use App\Models\Translator;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TranslatorsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('translator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translators = Translator::with(['translator', 'translator_langs', 'created_by'])->get();

        return view('frontend.translators.index', compact('translators'));
    }

    public function create()
    {
        abort_if(Gate::denies('translator_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translators = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $translator_langs = Language::pluck('language', 'id');

        return view('frontend.translators.create', compact('translator_langs', 'translators'));
    }

    public function store(StoreTranslatorRequest $request)
    {
        $translator = Translator::create($request->all());
        $translator->translator_langs()->sync($request->input('translator_langs', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $translator->id]);
        }

        return redirect()->route('frontend.translators.index');
    }

    public function edit(Translator $translator)
    {
        abort_if(Gate::denies('translator_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translators = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $translator_langs = Language::pluck('language', 'id');

        $translator->load('translator', 'translator_langs', 'created_by');

        return view('frontend.translators.edit', compact('translator', 'translator_langs', 'translators'));
    }

    public function update(UpdateTranslatorRequest $request, Translator $translator)
    {
        $translator->update($request->all());
        $translator->translator_langs()->sync($request->input('translator_langs', []));

        return redirect()->route('frontend.translators.index');
    }

    public function show(Translator $translator)
    {
        abort_if(Gate::denies('translator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translator->load('translator', 'translator_langs', 'created_by');

        return view('frontend.translators.show', compact('translator'));
    }

    public function destroy(Translator $translator)
    {
        abort_if(Gate::denies('translator_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translator->delete();

        return back();
    }

    public function massDestroy(MassDestroyTranslatorRequest $request)
    {
        Translator::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('translator_create') && Gate::denies('translator_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Translator();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
