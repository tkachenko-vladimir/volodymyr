<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNotarizationRequest;
use App\Http\Requests\StoreNotarizationRequest;
use App\Http\Requests\UpdateNotarizationRequest;
use App\Models\Client;
use App\Models\Notarization;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotarizationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notarization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notarizations = Notarization::with(['client_docum'])->get();

        return view('frontend.notarizations.index', compact('notarizations'));
    }

    public function create()
    {
        abort_if(Gate::denies('notarization_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client_docums = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.notarizations.create', compact('client_docums'));
    }

    public function store(StoreNotarizationRequest $request)
    {
        $notarization = Notarization::create($request->all());

        return redirect()->route('frontend.notarizations.index');
    }

    public function edit(Notarization $notarization)
    {
        abort_if(Gate::denies('notarization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client_docums = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notarization->load('client_docum');

        return view('frontend.notarizations.edit', compact('client_docums', 'notarization'));
    }

    public function update(UpdateNotarizationRequest $request, Notarization $notarization)
    {
        $notarization->update($request->all());

        return redirect()->route('frontend.notarizations.index');
    }

    public function show(Notarization $notarization)
    {
        abort_if(Gate::denies('notarization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notarization->load('client_docum');

        return view('frontend.notarizations.show', compact('notarization'));
    }

    public function destroy(Notarization $notarization)
    {
        abort_if(Gate::denies('notarization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notarization->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotarizationRequest $request)
    {
        Notarization::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
