<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStationStoreRequest;
use App\Http\Requests\ServiceStationUpdateRequest;
use App\Models\ServiceStation;
use Illuminate\Http\Request;

class ServiceStationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $serviceStations = ServiceStation::all();

        return view('serviceStation.index', compact('serviceStations'));
    }

    public function create(Request $request)
    {
        return view('serviceStation.create');
    }

    public function store(ServiceStationStoreRequest $request)
    {
        $serviceStation = ServiceStation::create($request->validated());

        $request->session()->flash('serviceStation.id', $serviceStation->id);

        return redirect()->route('serviceStation.index');
    }

    public function show(Request $request, ServiceStation $serviceStation)
    {
        return view('serviceStation.show', compact('serviceStation'));
    }

    public function edit(Request $request, ServiceStation $serviceStation)
    {
        return view('serviceStation.edit', compact('serviceStation'));
    }

    public function update(ServiceStationUpdateRequest $request, ServiceStation $serviceStation)
    {
        $serviceStation->update($request->validated());

        $request->session()->flash('serviceStation.id', $serviceStation->id);

        return redirect()->route('serviceStation.index');
    }

    public function destroy(Request $request, ServiceStation $serviceStation)
    {
        $serviceStation->delete();

        return redirect()->route('serviceStation.index');
    }
}
