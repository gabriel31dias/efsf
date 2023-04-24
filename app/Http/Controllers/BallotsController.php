<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use App\Models\DirectorSignature;
use Illuminate\Http\Request;
use App\Models\Unit;

class BallotsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $ballots = Ballot::find($request->id);
        return view('ballots.index', compact('ballots'));
    }

    public function create(Request $request)
    {
        return view('ballots.create');
    }

    public function show(Request $request, Ballot $ballots)
    {
        return view('ballots.show', compact('ballots'));
    }


    public function edit($id)
    {
        $ballots = Ballot::find($id);
        return view('ballots.edit', compact('ballots'));
    }


    public function destroy(Request $request, Ballot $ballots)
    {
        $ballots->delete();

        return redirect()->route('ballots.index');
    }
}
