<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $citizen = Unit::find($request->id);

        return view('unit.index', compact('citizen'));
    }

    public function create(Request $request)
    {
        return view('unit.create');
    }

    public function show(Request $request, Unit $profile)
    {
        return view('unit.show', compact('profile'));
    }


    public function edit(Request $request, Unit $unit)
    {
        return view('unit.edit', compact('unit'));
    }


    public function destroy(Request $request, Unit $profile)
    {
        $profile->delete();

        return redirect()->route('unit.index');
    }
}
