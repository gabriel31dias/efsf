<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use Illuminate\Http\Request;

class UfController extends Controller
{
    public function index()
    {
        return view('uf.index');
    }

    public function create()
    {
        return view('uf.create');
    }

    public function edit(Request $request, Uf $uf)
    {
        return view('uf.edit', compact('uf'));
    }
}
