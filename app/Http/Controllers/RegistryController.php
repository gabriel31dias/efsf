<?php

namespace App\Http\Controllers;

use App\Models\Registry;
use Illuminate\Http\Request;

class RegistryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('registry.index');
    }

    public function create(Request $request)
    {
        return view('registry.create');
    }

    public function show(Request $request, Registry $registry)
    {
        return view('registry.show', compact('registry'));
    }

    public function edit(Request $request, Registry $registry)
    {
        return view('registry.edit', compact('registry'));
    }

    public function destroy(Request $request, Registry $registry)
    {
        $registry->delete();

        return redirect()->route('registry.index');
    }
}
