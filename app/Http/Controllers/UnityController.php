<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class UnityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $citizen = Citizen::find($request->id);

        return view('unit.index', compact('citizen'));
    }

    public function create(Request $request)
    {
        return view('unit.create');
    }


    public function show(Request $request, Citizen $profile)
    {
        return view('unit.show', compact('profile'));
    }


    public function edit(Request $request, Citizen $citizen)
    {
        return view('unit.edit', compact('citizen'));
    }


    public function destroy(Request $request, Citizen $profile)
    {
        $profile->delete();

        return redirect()->route('unit.index');
    }
}
