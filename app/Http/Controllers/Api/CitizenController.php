<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\Filiation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CitizenController extends Controller
{

    public function obterDados(Request $request)
    {

        try {
            $params = json_decode($request->getContent(), 1);
            $citizen = Citizen::where('cpf', $params['cpf'])->first();
            if (!$citizen) throw new Exception("cpf not found", 404);
            $father = Filiation::where('type', Filiation::TYPE_PATERNAL)->where('citizen_id', $citizen->id)->first();
            $mother = Filiation::where('type', Filiation::TYPE_MATERNAL)->where('citizen_id', $citizen->id)->first();
            $citizenData = [
                "name" => "{$citizen->name}",
                "uf_local" => "{$citizen->uf->acronym}",
                "father_name" => "{$father->name}",
                "mother_name" => "{$mother->name}",
                "birthday" => "{$citizen->birth_date}",
                "nationality" => "{$citizen->country->name}",
                "uf_birth" => "{$citizen->uf->name}",
                "place_birth" => "{$citizen->county->name}",
                "gender" => "{$citizen->genre->name}",
                "document" => "{$citizen->rg}",
                "cpf" => "{$citizen->cpf}",
                "obs" => "",
                "certidao" => "{$citizen->registry->name}",
            ];

            return response()->json(["sucesso" => true, "data" => $citizenData]);
        } catch (\Throwable $th) {
            return response()->json(["sucesso" => false, "message" => $th->getMessage()], 500);
        }
    }

    public function receberBiometria(Request $request)
    {
        $params = json_decode($request->getContent(), 1);

        $keysToConvert = [
            "facePicture",
            "rightThumb",
            "rightIndexMiddle",
            "rightRingLittle",
            "leftThumb",
            "leftIndexMiddle",
            "leftRingLittle",
            "rolledRightThumb",
            "rolledRightIndex",
            "rolledRightMiddle",
            "rolledRightRing",
            "rolledRightLittle",
            "rolledLeftThumb",
            "rolledLeftIndex",
            "rolledLeftMiddle",
            "rolledLeftRing",
            "rolledLeftLittle",
        ];

        $convertedData = [];

        foreach ($params as $key => $value) {
            if (in_array($key, $keysToConvert)) {
                $filePath = $this->saveByteImage($value);
                $convertedData[$key] = $filePath;
            } else {
                $convertedData[$key] = $value;
            }
        }

        dd($convertedData);
    }

    function saveByteImage($byteImage)
    {
        dd($byteImage);
        $extension = 'png'; // Defina a extensão desejada
        $fileName = uniqid().'.'.$extension;
    
        $path = 'images/' . $fileName;
    
        // Salvar os bytes no arquivo
        Storage::disk('local')->put($path, $byteImage);
    
        return $path;
    }
}
