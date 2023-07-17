<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use App\Models\Filiation;
use Carbon\Carbon;
use Exception;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CitizenController extends Controller
{

    public function obterDados($cpf)
    {

        try {
            
            if (!isset($cpf)) throw new Exception("cpf is required", 404);

            $citizen = Citizen::where('cpf', $cpf)->first();
            if (!$citizen) throw new Exception("cpf not found", 404);

            $father = Filiation::where('type', Filiation::TYPE_PATERNAL)->where('citizen_id', $citizen->id)->first();
            $mother = Filiation::where('type', Filiation::TYPE_MATERNAL)->where('citizen_id', $citizen->id)->first();
            $nascimento = Carbon::createFromFormat('Y-m-d', $citizen->birth_date)->format('d/m/Y');
            $citizenData = [
                "name" => "{$citizen->name}",
                "uf_local" => "{$citizen->uf->acronym}",
                "father_name" => "{$father->name}",
                "mother_name" => "{$mother->name}",
                "birthday" => "{$nascimento}",
                "nationality" => "{$citizen->country->name}",
                "uf_birth" => "{$citizen->uf->name}",
                "place_birth" => "{$citizen->county->name}",
                "gender" => "{$citizen->genre->name}",
                "document" => "{$citizen->rg}",
                "cpf" => "{$citizen->cpf}",
                "obs" => "",
                "certidao" => "{$citizen->registry->name}",
            ];

            return response()->json(["message" => "cpf Found", "data" => $citizenData]);
        } catch (\Throwable $th) {
            return response()->json(["success" => false, "message" => $th->getMessage()], !empty($th->getCode()) ? $th->getCode() : 500);
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
            "rightThumb_png",
            "rightIndexMiddle_png",
            "rightRingLittle_png",
            "leftThumb_png",
            "leftIndexMiddle_png",
            "leftRingLittle_png",
            "rolledRightThumb_png",
            "rolledRightIndex_png",
            "rolledRightMiddle_png",
            "rolledRightRing_png",
            "rolledRightLittle_png",
            "rolledLeftThumb_png",
            "rolledLeftIndex_png",
            "rolledLeftMiddle_png",
            "rolledLeftRing_png",
            "rolledLeftLittle_png",
        ];

        $convertedData = [];
        
        foreach ($params as $key => $value) {
            if (in_array($key, $keysToConvert)) {
                $filePath = $this->saveByteImage($value, $key);
                $convertedData[$key] = $filePath;
            } else {
                $convertedData[$key] = $value;
            }
        }
        dd($convertedData);
        return response()->json(["message" => "finished", "success" => true]);
    }

    function saveByteImage($byteImage, $key)
    {
        $extension = $this->getExtension($key); 
        $fileName = uniqid().'.'.$extension;
    
        $path = 'images/' . $fileName;
        $conteudoBlob = substr($byteImage, 2, -1);

        // Decodifica o objeto bytes literal para obter os dados binários
        $dadosBinarios = base64_decode($conteudoBlob);
        
        // Salvar os bytes no arquivo
        Storage::disk('local')->put($path,  $dadosBinarios);
        

        return $path;
    }

    private function getExtension($key){ 
        if($key == 'facePicture'){ 
            $extension = "jpg";

        } elseif(str_contains($key, "png")) { 
            $extension = "png";

        } else { 
            $extension = "wsq";
        }
        return $extension;
    }
}
