<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index()
    {
        return view('county.index');
    }

    public function create()
    {
        return view('county.create');
    }

    public function edit(Request $request, County $county)
    {
        return view('county.edit', compact('county'));
    }
}
