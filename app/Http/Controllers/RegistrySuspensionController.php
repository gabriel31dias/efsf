<?php

namespace App\Http\Controllers;

use App\Models\RegistrySuspension;
use Illuminate\Http\Request;

class RegistrySuspensionController extends Controller
{
    public function index()
    {
        return view('registry.indexSuspension');
    }

    public function create()
    {
        return view('registry.createSuspension');
    }

    public function edit(Request $request, RegistrySuspension $registrySuspension)
    {
        return view('registry.editSuspension', compact('registrySuspension'));
    }
}
