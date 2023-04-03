<?php

namespace App\Http\Controllers;

use App\Models\DirectorSignature;
use Illuminate\Http\Request;
use App\Models\Unit;

class DirectorSignatureController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $citizen = DirectorSignature::find($request->id);

        return view('directorSignature.index', compact('citizen'));
    }

    public function create(Request $request)
    {
        return view('directorSignature.create');
    }

    public function show(Request $request, DirectorSignature $directorSign)
    {
        return view('directorSignature.show', compact('directorSign'));
    }


    public function edit($id)
    {
        $directorSign = DirectorSignature::find($id);
        return view('directorSignature.edit', compact('directorSign'));
    }


    public function destroy(Request $request, DirectorSignature $directorSign)
    {
        $directorSign->delete();

        return redirect()->route('directorSignature.index');
    }
}
