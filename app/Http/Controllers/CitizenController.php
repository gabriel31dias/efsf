<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class CitizenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $citizen = Citizen::find($request->id);

        return view('citizen.index', compact('citizen'));
    }

    public function create(Request $request)
    {
        return view('citizen.create');
    }


    public function show(Request $request, Citizen $profile)
    {
        return view('citizen.show', compact('profile'));
    }


    public function edit(Request $request, Citizen $citizen)
    {
        return view('citizen.edit', compact('citizen'));
    }


    public function destroy(Request $request, Citizen $profile)
    {
        $profile->delete();

        return redirect()->route('citizen.index');
    }
}
