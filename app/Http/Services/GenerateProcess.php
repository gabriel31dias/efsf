<?php

namespace App\Http\Services;
use App\Models\Process;
use App\Models\Registry;
use App\Models\RegistryDate;
use Carbon\Carbon;

class GenerateProcess
{
    private $objectProcess = [];

    public function call($obj){
        $objectProcess = $obj;

        $lastProcessCitizen = Process::where(['citizen_id' => $objectProcess['citizen_id']])->first();

        $code = '';
        $status = '';

        if (isset($lastProcessCitizen->id) && $lastProcessCitizen->divergence == true){
            $lastProcessCitizen->update(['divergence' => false]);
            $status = "updated";
        }else{
            $code = $this->generateCode();
            Process::create([
                "code" => $code,
                "user_id" => $objectProcess['user_id'],
                "process" => date('m')."/".date('Y'),
                "citizen_id" => $objectProcess["citizen_id"],
                "service_station_id" => $objectProcess["service_station"],
                "biometrics_status" => $objectProcess["biometrics_status"],
                "situation" => $objectProcess["situation"],
                "payment" => $objectProcess["payment"],
            ]);
            $status = "created";
        }

        return [
            "status" => $status,
            "code" => $code,
        ];
    }

    private function generateCode(){
        $numero_de_bytes = 6;
        $restultado_bytes = random_bytes($numero_de_bytes);
        $resultado_final = bin2hex($restultado_bytes);
        return $resultado_final;
    }
}
