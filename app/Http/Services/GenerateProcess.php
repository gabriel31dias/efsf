<?php

namespace App\Http\Services;
use App\Models\Process;
use App\Models\Registry;
use App\Models\RegistryDate;
use Carbon\Carbon;

class GenerateProcess
{
    public function call($obj){
        Process::create([
            "process" => date('m')."/".date('Y'),
            "citizen_id" => $obj["citizen_id"],
            "posto" => $obj["posto"],
            "biometrics_status" => $obj["biometrics_status"],
            "situation" => $obj["situation"],
            "payment" => $obj["payment"],
        ]);
    }

}
