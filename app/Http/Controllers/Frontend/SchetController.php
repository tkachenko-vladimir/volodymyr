<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySchetRequest;
use App\Http\Requests\StoreSchetRequest;
use App\Http\Requests\UpdateSchetRequest;
use App\Models\Client;
use App\Models\Schet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SchetController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('schet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schets = Schet::with(['klient_name'])->get();

        return view('frontend.schets.index', compact('schets'));
    }

    public function create()
    {
        abort_if(Gate::denies('schet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klient_names = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.schets.create', compact('klient_names'));
    }

    public function store(StoreSchetRequest $request)
    {
        $schet = Schet::create($request->all());

        return redirect()->route('frontend.schets.index');
    }

    public function edit(Schet $schet)
    {
        abort_if(Gate::denies('schet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $klient_names = Client::pluck('name_client', 'id')->prepend(trans('global.pleaseSelect'), '');

        $schet->load('klient_name');

        return view('frontend.schets.edit', compact('klient_names', 'schet'));
    }

    public function update(UpdateSchetRequest $request, Schet $schet)
    {
        $schet->update($request->all());

        return redirect()->route('frontend.schets.index');
    }

    public function show(Schet $schet)
    {
        abort_if(Gate::denies('schet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schet->load('klient_name');

        return view('frontend.schets.show', compact('schet'));
    }

    public function destroy(Schet $schet)
    {
        abort_if(Gate::denies('schet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $schet->delete();

        return back();
    }

    public function massDestroy(MassDestroySchetRequest $request)
    {
        Schet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
