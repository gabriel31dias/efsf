<?php

namespace App\Http\Controllers;

use App\Models\RegistryInterdiction;
use Illuminate\Http\Request;

class RegistryInterdictionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('registry.indexInterdiction');
    }

    public function create()
    {
        return view('registry.createInterdiction');
    }

    public function edit(Request $request, RegistryInterdiction $registryInterdiction)
    {
        return view('registry.editInterdiction', compact('registryInterdiction'));
    }


}
