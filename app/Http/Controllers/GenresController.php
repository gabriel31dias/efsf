<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\Genre;

class GenresController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $genres = Genre::all();

        return view('genres.index', compact('genres'));
    }

    public function create(Request $request)
    {
        return view('genres.create');
    }


    public function show(Request $request, Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }


    public function edit(Request $request, Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }


    public function destroy(Request $request, Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index');
    }
}
