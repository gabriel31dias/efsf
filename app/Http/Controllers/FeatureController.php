<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        return view('feature.index');
    }

    public function create()
    {
        return view('feature.create');
    }

    public function edit(Request $request, Feature $feature)
    {
        return view('feature.edit', compact('feature'));
    }
}
