<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class GenresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $genres = Citizen::all();

        return view('genres.index', compact('genres'));
    }

    public function create(Request $request)
    {
        return view('genres.create');
    }


    public function show(Request $request, Citizen $genre)
    {
        return view('genres.show', compact('genre'));
    }


    public function edit(Request $request, Citizen $genre)
    {
        return view('genres.edit', compact('genre'));
    }


    public function destroy(Request $request, Citizen $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index');
    }
}
