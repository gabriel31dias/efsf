<?php

namespace App\Http\Services;
use App\Models\Process;
use App\Models\Registry;
use App\Models\Dispatch;
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
            $code =  $lastProcessCitizen->code;
        }else{
            $code = $this->generateCode();
            $p = Process::create([
                "code" => $code,
                "user_id" => $objectProcess['user_id'],
                "name" => $objectProcess['name'],
                "process" => date('m')."/".date('Y'),
                "citizen_id" => $objectProcess["citizen_id"],
                "service_station_id" => $objectProcess["service_station"],
                "biometrics_status" => $objectProcess["biometrics_status"],
                "situation" => $objectProcess["situation"],
                "payment" => $objectProcess["payment"],
            ]);
            $status = "created";

            Dispatch::create([
                'user_id' => $objectProcess['user_id'],
                'process_id' => $p->id,
                'type' => 1,
                'comment' => "Primeiro despacho é enviado automaticamente pelo usuário do atendimento ao setor de triagem",
                'statusString' => Process::SITUATION_TYPES_LABELS[1],
            ]);
        }

        return [
            "status" => $status,
            "code" => $code,
        ];
    }

    private function generateCode(){
        return str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
    }
}
