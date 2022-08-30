<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $profiles = Profile::all();

        return view('profile.index', compact('profiles'));
    }

    public function create(Request $request)
    {
        return view('profile.create');
    }

    public function store(ProfileStoreRequest $request)
    {
        $profile = Profile::create($request->validated());

        $request->session()->flash('profile.id', $profile->id);

        return redirect()->route('profile.index');
    }


    public function show(Request $request, Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }


    public function edit(Request $request, Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }


    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $profile->update($request->validated());

        $request->session()->flash('profile.id', $profile->id);

        return redirect()->route('profile.index');
    }

    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profile.index');
    }
}
