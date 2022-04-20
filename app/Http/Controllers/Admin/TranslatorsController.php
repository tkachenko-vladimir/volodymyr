<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class TranslatorsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('translator_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Translator::with(['translator', 'translator_langs', 'created_by'])->select(sprintf('%s.*', (new Translator())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'translator_show';
                $editGate = 'translator_edit';
                $deleteGate = 'translator_delete';
                $crudRoutePart = 'translators';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('fio', function ($row) {
                return $row->fio ? $row->fio : '';
            });
            $table->addColumn('translator_name', function ($row) {
                return $row->translator ? $row->translator->name : '';
            });

            $table->editColumn('translator_lang', function ($row) {
                $labels = [];
                foreach ($row->translator_langs as $translator_lang) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $translator_lang->language);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('number_card', function ($row) {
                return $row->number_card ? $row->number_card : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'translator', 'translator_lang']);

            return $table->make(true);
        }

        return view('admin.translators.index');
    }

    public function create()
    {
        abort_if(Gate::denies('translator_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translators = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $translator_langs = Language::pluck('language', 'id');

        return view('admin.translators.create', compact('translator_langs', 'translators'));
    }

    public function store(StoreTranslatorRequest $request)
    {
        $translator = Translator::create($request->all());
        $translator->translator_langs()->sync($request->input('translator_langs', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $translator->id]);
        }

        return redirect()->route('admin.translators.index');
    }

    public function edit(Translator $translator)
    {
        abort_if(Gate::denies('translator_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translators = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $translator_langs = Language::pluck('language', 'id');

        $translator->load('translator', 'translator_langs', 'created_by');

        return view('admin.translators.edit', compact('translator', 'translator_langs', 'translators'));
    }

    public function update(UpdateTranslatorRequest $request, Translator $translator)
    {
        $translator->update($request->all());
        $translator->translator_langs()->sync($request->input('translator_langs', []));

        return redirect()->route('admin.translators.index');
    }

    public function show(Translator $translator)
    {
        abort_if(Gate::denies('translator_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $translator->load('translator', 'translator_langs', 'created_by');

        return view('admin.translators.show', compact('translator'));
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
