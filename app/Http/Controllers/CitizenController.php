<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citizen;

class CitizenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $citizen = Citizen::find($request->id);

        return view('citizen.index', compact('citizen'));
    }

    public function create(Request $request)
    {
        return view('citizen.create');
    }

    public function generateProtuario($id)
    {
        $citizen = Citizen::find($id);

        $filiations = [];

        array_push($filiations, $citizen->filiation1);
        array_push($filiations, $citizen->filiation2);

        $filiationsPlus = \json_decode($citizen->other_filiations);

        foreach ($filiationsPlus as $filiation) {
            array_push($filiations, $filiation);
        }

        $professional_idents = [];

        $features = \json_decode($citizen->features);

        $professional_identitis =  \json_decode($citizen->professional_identitis) ;

        foreach ($professional_identitis as $professional_ident) {
            array_push($professional_idents, $professional_ident->professional_id_number_1);
        }



        return \PDF::loadView('citizen.file', compact('filiations'), compact('features'), compact('professional_idents'))
            ->stream('prontuario.pdf');
    }


    public function show(Request $request, Citizen $profile)
    {
        return view('citizen.show', compact('profile'));
    }


    public function edit(Request $request, Citizen $citizen)
    {
        return view('citizen.edit', compact('citizen'));
    }


    public function destroy(Request $request, Citizen $profile)
    {
        $profile->delete();

        return redirect()->route('citizen.index');
    }
}
