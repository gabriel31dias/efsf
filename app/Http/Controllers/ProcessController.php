<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Process;

class ProcessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $citizen = Process::find($request->id);

        return view('process.index', compact('citizen'));
    }

    public function show(Request $request, Unit $profile)
    {
        return view('process.show', compact('profile'));
    }


    public function edit(Request $request, Unit $unit)
    {
        return view('process.edit', compact('unit'));
    }


    public function destroy(Request $request, Unit $profile)
    {
        $profile->delete();

        return redirect()->route('unit.index');
    }
}
