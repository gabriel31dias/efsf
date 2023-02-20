<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Feature;
use App\Models\Genre;
use App\Models\MaritalStatus;
use App\Models\Uf;
use Illuminate\Http\Request;
use App\Models\Citizen;
use App\Models\Occupation;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;


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

        $birthCity = $this->getBirthCity($citizen->county_id);
        $uf = $this->getState($citizen->uf_id);
        $maritalStatus = $this->getMaritalStatus($citizen->marital_status_id);

        $profession = $this->getProfession($citizen->occupation_id);

        $genre = $this->getGender($citizen->genre_id);

        $featuresx = $this->getFeautures();

        

        if($citizen->file_capture_image){
            $photo ='data:image/' . 'png' . ';base64,' . base64_encode(\Illuminate\Support\Facades\File::get(storage_path('app/public/face_captures/'. $citizen->file_capture_image ?? '')));
        }

        $html = view('citizen.file', ['citizen' => $citizen,  'filiations' => $filiations,'photo' => $photo ?? '',
            'birthCity' => $birthCity, 'uf' => $uf, 'maritalStatus' =>  $maritalStatus, 'profession' => $profession,
            'genre' => $genre, 'features' => $features, 'featuresx' => $featuresx
        ]);

        $uuid = $this->generateUUID();
        $dompdf = new Dompdf(array('enable_remote' => true));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        $file = $dompdf->output();
        $prontuario = Storage::put('public/prontuarios/'.$uuid.'.pdf', $file);
        $this->saveProntuario($uuid, $id, $citizen);
        $dompdf->stream('prontuario', array('Attachment' => 0));
    }

    function generateUUID() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    public function saveProntuario($uuiName, $id, $citizen){
        $digitalized_document = json_decode($citizen->digitalized_documents, true) ;
        $firstDocument = count($digitalized_document);

        $notFiltered = array_filter($digitalized_document, function ($item) {
            return $item['type'] != '23';
        });

        $filtered = array_filter($digitalized_document, function ($item) {
            return $item['type'] === '23';
        });

        foreach ($filtered as &$item) {
            $item['type'] = "23";
            $item['file'] = "public/prontuarios/".$uuiName.".pdf";
        }

        if($filtered){
            $digitalized_document = array_merge($filtered, $notFiltered);
        }else{
            $docObj = ["file" => "public/prontuarios/".$uuiName.".pdf", "type" => '23'];
            $digitalized_document["file". $firstDocument] = $docObj;
        }

        $citizen->update([
            'digitalized_documents' => json_encode($digitalized_document) ,
        ]);
    }

    public function getBirthCity($county_id){
       return County::where(['id' => $county_id])->first();
    }

    public function getFeautures(){
        return Feature::all();
    }

    public function getProfession($occupation_id){
        return Occupation::where(['id' => $occupation_id])->first();
    }

    public function getGender($gender_id){
        return Genre::where(['id' => $gender_id])->first();
    }

    public function getState($uf_id){
        return Uf::where(['id' => $uf_id])->first();
    }

    public function getMaritalStatus($id_marital){
        return MaritalStatus::where(['id' => $id_marital])->first();
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
